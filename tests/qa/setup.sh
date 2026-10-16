#!/usr/bin/env bash
# Disposable QA site: PHP 8.1 (plugin minimum) + WordPress + WooCommerce + the plugin
# installed from the RELEASE ZIP in dist/ (so QA tests exactly what ships).
#
#   bash tests/qa/setup.sh        # build / refresh the site at http://localhost:8088 (admin/admin)
#   bash tests/qa/setup.sh down   # destroy containers + volumes
#
# Versions: WP_VERSION (default 7.1), WC_VERSION (default 11.1.1).
set -euo pipefail
export MSYS_NO_PATHCONV=1                       # Git Bash: don't rewrite container paths
DIR="$(cd "$(dirname "$0")" && (pwd -W 2>/dev/null || pwd))"   # pwd -W: Windows path for Docker under Git Bash
PLUGIN="$(cd "$DIR/../.." && (pwd -W 2>/dev/null || pwd))"
DC=(docker compose -f "$DIR/compose.yml")
wp() { "${DC[@]}" exec -T wp php -d memory_limit=1G /usr/local/bin/wp "$@"; }

if [ "${1:-}" = "down" ]; then "${DC[@]}" down -v; exit 0; fi

VERSION=$(sed -n 's/^ \* Version: *//p' "$PLUGIN/cloudflare-r2-offload.php" | tr -d '\r')
ZIP="$PLUGIN/dist/cloudflare-r2-offload-$VERSION.zip"
[ -f "$ZIP" ] || { echo "Missing $ZIP — run 'composer release' first."; exit 1; }

"${DC[@]}" up -d
"${DC[@]}" cp "$DIR/router.php" wp:/var/www/html/router.php

if ! wp core is-installed 2>/dev/null; then
  wp core download --version="${WP_VERSION:-7.1}" --force --quiet
  "${DC[@]}" cp "$DIR/router.php" wp:/var/www/html/router.php
  wp config create --dbname=wp --dbuser=wp --dbpass=wp --dbhost=db --force --quiet --extra-php <<'PHP'
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', '/var/www/html/wp-content/debug.log' );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_ENVIRONMENT_TYPE', 'local' );
define( 'WP_MEMORY_LIMIT', '512M' );
define( 'AUTOMATIC_UPDATER_DISABLED', true );   // pin versions: QA must be repeatable
PHP
  wp core install --url=http://localhost:8088 --title=R2QA --admin_user=admin --admin_password=admin \
     --admin_email=qa@example.com --skip-email --quiet
  wp rewrite structure '/%postname%/' --quiet
  wp plugin install woocommerce --version="${WC_VERSION:-11.1.1}" --activate --quiet
  # A fresh WooCommerce redirects the first admin page view to its setup wizard; skip it
  # like any configured store, otherwise the first visit to the plugin's settings is hijacked.
  wp transient delete _wc_activation_redirect --quiet || true
  wp option update woocommerce_onboarding_profile '{"skipped":true,"completed":true}' --format=json --quiet
fi

# Always (re)install the current release zip — exercises the real upgrade/install path.
"${DC[@]}" cp "$ZIP" "wp:/tmp/$(basename "$ZIP")"
wp plugin install "/tmp/$(basename "$ZIP")" --force --activate

# Helper + realistic test media.
"${DC[@]}" cp "$DIR/qa-h.php" wp:/tmp/qa-h.php
"${DC[@]}" cp "$DIR/gen.php"  wp:/tmp/gen.php
"${DC[@]}" exec -T wp php /tmp/gen.php >/dev/null
rm -rf "$DIR/img" && "${DC[@]}" cp wp:/tmp/qa-img "$DIR/img"

# REST credentials for the driver (local throwaway site).
wp user application-password delete admin --all --quiet 2>/dev/null || true
wp user application-password create admin qa --porcelain | tr -d '\r' | sed 's/^/admin:/' > "$DIR/.ap"

echo "Ready: http://localhost:8088  (WP $(wp core version | tr -d '\r'), WC $(wp plugin get woocommerce --field=version | tr -d '\r'), plugin $VERSION)"
echo "Run:   php tests/qa/qa.php        Mutations: php tests/qa/mutate.php"

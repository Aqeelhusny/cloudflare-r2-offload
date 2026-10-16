# End-to-end QA (real WordPress + WooCommerce + real R2)

Drives a disposable site the way a user does — cookie login + admin-ajax, REST and
multipart uploads (incl. WP 7.1 client-side `sideload`/`finalize`), WooCommerce REST,
WP-CLI, WP-Cron — and verifies every file against the bucket with a raw S3 `HeadObject`
(independent of the plugin's own `R2Client`).

**Prerequisites:** Docker, PHP ≥ 8.1 with curl on the host, a built zip (`composer release`),
and `.env.r2-test` in the plugin root (see `tests/test-r2-live.php`). Use a **test bucket**:
everything is written under a unique `qa-<timestamp>/` prefix and deleted at the end.

```bash
bash tests/qa/setup.sh            # PHP 8.1 + WP 7.1.3 + WC 11.2.1 + plugin from dist zip → http://localhost:8088 (admin/admin)
php  tests/qa/qa.php              # full scenario suite (A–R, P)
QA_ONLY=DJ php tests/qa/qa.php    # subset; A,B,C always run (they set up credentials + shared media)
php  tests/qa/mutate.php          # inject each bug in mutations.php into the installed plugin, expect red
php  tests/qa/mutate-unit.php     # same catalogue + unit-only bugs against the unit suites (source restored + sha1-verified)
bash tests/qa/setup.sh down       # destroy containers and volumes
```

| Section | Covers |
|---|---|
| A | activation, tables, WooCommerce HPOS + Blocks compatibility |
| B | settings via admin-ajax, encrypted secret, Test Connection, anonymous / subscriber (incl. own valid nonce) blocked |
| C | server-side uploads: JPEG, big image (`-scaled` + `original_image`), PDF, excluded MIME, upload-on-save off |
| D | WP 7.1 client-side processing: create → sideload → finalize, Delete-local on/off, animated-GIF companions |
| E | URL rewriting: url, srcset, content, original image, REST, unsynced stays local, toggle off |
| F | WooCommerce: REST products, variation galleries, product page, Store API, gallery re-sync, regenerate |
| G | background queue: auto-processed via `kick()`, row cleanup, `DISABLE_WP_CRON` warning |
| H | WP-CLI `status` (vs DB), `sync`, `migrate`, `retry` of a failed row |
| I–M | delete-local → restore (byte-identical), 1.4.0 upgrade, bad credentials, delete media, deactivate |
| N, R, P | no PHP notices from the plugin, two-worker queue claim race on real MariaDB, PHP 7.4 refusal |

A scenario only counts if it fails when the feature is broken — `mutations.php` lists the
bug each one must catch; `mutate.php` proves it.

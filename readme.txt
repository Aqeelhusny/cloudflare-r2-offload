=== Cloudflare R2 Offload ===
Contributors: aqeelhusny
Tags: cloudflare, r2, media, offload, cdn
Requires at least: 5.8
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Offload your WordPress media library to Cloudflare R2 with custom CDN domain support, bulk migration, file manager, and upload stats.

== Description ==

Cloudflare R2 Offload automatically uploads your WordPress media library to Cloudflare R2 object storage and rewrites URLs to serve files from your custom CDN domain. Reduce server disk usage and serve media faster through Cloudflare's global network.

**Key Features:**

* **Automatic upload** — new media is uploaded to R2 immediately after WordPress generates all image sizes.
* **Bulk migration** — migrate your entire existing media library to R2 with a one-click background process powered by WP-Cron.
* **Custom CDN domain** — serve media from your own domain (e.g. cdn.example.com) via Cloudflare's CDN.
* **Serve from R2 toggle** — instantly switch between serving from R2/CDN and your local server.
* **WooCommerce compatible** — product images, gallery thumbnails, and REST API image URLs are all rewritten automatically.
* **Multipart upload** — large files are uploaded using multipart upload for reliability.
* **Delete local files** — optionally delete local copies after upload to free server disk space.
* **Restore from R2** — download files back from R2 to your server at any time.
* **File manager** — browse, search, and manage files stored in your R2 bucket directly from WordPress.
* **Upload stats** — daily upload counts, bytes transferred, and failure tracking with a 30-day chart.
* **Multisite support** — works correctly across multisite blog switches.
* **Secure credentials** — API keys are encrypted with AES-256-CBC before storage.

**How It Works:**

1. Enter your Cloudflare R2 credentials (Account ID, Access Key, Secret Key, Bucket).
2. Set your custom CDN domain and path prefix.
3. Enable "Serve from Cloudflare R2" to start rewriting media URLs.
4. Use the Migration page to upload existing media to R2 in the background.

**Requirements:**

* PHP 7.4 or higher
* WordPress 5.8 or higher
* A Cloudflare account with R2 storage enabled
* An R2 API token with Object Read & Write permissions

== Installation ==

1. Upload the `cloudflare-r2-offload` folder to the `/wp-content/plugins/` directory, or install directly through the WordPress plugin screen.
2. Activate the plugin through the "Plugins" screen in WordPress.
3. Go to **R2 Offload > Settings** and enter your Cloudflare R2 credentials.
4. Click **Save Credentials**, then **Test Connection** to verify.
5. Set your custom CDN domain and enable "Serve from Cloudflare R2".
6. Go to **R2 Offload > Migration** to migrate existing media.

== Frequently Asked Questions ==

= What R2 API token permissions do I need? =

Your API token needs **Object Read & Write** permissions on the target bucket. You do not need Admin Read — the plugin uses ListObjectsV2 instead of HeadBucket for connection testing.

= Will this slow down my site? =

No. The plugin uses a lazy boot architecture: on frontend page views, only the lightweight URL rewriter loads. The AWS SDK and all admin classes are only loaded for admin, AJAX, and cron requests.

= What happens if I deactivate the plugin? =

Media URLs revert to your local server. Your files remain in R2 — nothing is deleted. Re-activate to resume serving from R2.

= Can I restore files from R2 back to my server? =

Yes. Use the Restore feature on the Migration page, or the "Restore from R2" row action in the Media Library.

= Is WooCommerce supported? =

Yes. Product images, gallery thumbnails, srcset attributes, and WooCommerce REST API image URLs are all rewritten to use your CDN domain.

= Does it work with multisite? =

Yes. URL caches are flushed on blog switches, and wp_upload_dir() is used per-blog.

== Screenshots ==

1. Settings page — R2 connection, delivery, and behavior configuration.
2. Migration page — bulk migration with real-time progress tracking.
3. Stats page — daily upload chart and totals.
4. File manager — browse R2 objects grouped by image.

== Changelog ==

= 1.0.1 =
* Fixed: Migration INSERT query column mismatch causing silent failures on MySQL strict mode.
* Fixed: Double-encryption of secret key when saving via AJAX then submitting the settings form.
* Improved: Batch processor now loops continuously within a 50-second window for faster bulk migrations.
* Improved: Added spawn_cron() calls for reliable WP-Cron triggering on all hosts.
* Added: "Process Batch Now" button for manual batch processing when WP-Cron is unreliable.
* Added: "Serve from Cloudflare R2" toggle for instant CDN on/off switching.
* Added: Live stat updates during migration polling.
* Added: Image-based nested tree view in File Manager.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.1 =
Fixes a critical migration bug and adds a CDN on/off toggle. Recommended for all users.

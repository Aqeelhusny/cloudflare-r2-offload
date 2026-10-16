=== Cloudflare R2 Offload ===
Contributors: aqeelhusny
Tags: cloudflare, r2, media, offload, cdn
Requires at least: 5.8
Tested up to: 7.1
Requires PHP: 8.1
Stable tag: 1.5.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Offload your WordPress media library to Cloudflare R2 with custom CDN domain support, bulk migration, restore, desync, file manager, and upload stats.

== Description ==

Cloudflare R2 Offload automatically uploads your WordPress media library to Cloudflare R2 object storage and rewrites URLs to serve files from your custom CDN domain. Reduce server disk usage and serve media faster through Cloudflare's global network.

**Key Features:**

* **Automatic upload** — new media is uploaded to R2 immediately after WordPress generates all image sizes.
* **Background offload** — optionally queue new uploads for WP-Cron processing instead of syncing inline, keeping upload responses fast on slow connections.
* **Bulk migration** — migrate your entire existing media library to R2 with a one-click background process powered by WP-Cron.
* **Custom CDN domain** — serve media from your own domain (e.g. cdn.example.com) via Cloudflare's CDN.
* **Serve from R2 toggle** — instantly switch between serving from R2/CDN and your local server.
* **WooCommerce compatible** — product images, gallery thumbnails, REST API image URLs, HPOS, and Cart & Checkout Blocks are all supported.
* **Multipart upload** — large files are uploaded using multipart upload with parallel parts and automatic retry.
* **Delete local files** — optionally delete local copies after upload to free server disk space (per-upload or bulk).
* **Restore from R2** — download files back from R2 to your server at any time (single, bulk, or all), with live progress tracking.
* **Restore & Remove from R2** — fully disconnect from R2 by restoring all files, verifying downloads, then deleting from R2 and clearing all sync metadata.
* **File manager** — browse, search, copy URLs, and delete objects in your R2 bucket directly from WordPress.
* **Upload stats** — daily upload counts, bytes transferred, and failure tracking with a 30-day chart.
* **Media Library integration** — R2 Status column, per-attachment row actions, and bulk actions in the Media Library list view.
* **Live dashboard** — migration page auto-refreshes stats every 10 seconds with real-time progress for all operations.
* **Multisite support** — works correctly across multisite blog switches with per-blog URL cache invalidation.
* **Secure credentials** — API keys are encrypted with AES-256-CBC before storage; secret key is never echoed back.
* **Lazy boot** — only the lightweight URL rewriter loads on frontend page views; the full stack only loads for admin, AJAX, cron, and REST requests.
* **Auto-cleanup on delete** — when a media item is deleted from WordPress, its R2 copies are automatically removed.
* **MIME type exclusions** — skip specific file types from being uploaded to R2.
* **Developer hooks** — filters and actions for batch size, multipart settings, and completion events.

**How It Works:**

1. Enter your Cloudflare R2 credentials (Account ID, Access Key, Secret Key, Bucket).
2. Set your custom CDN domain and path prefix.
3. Enable "Serve from Cloudflare R2" to start rewriting media URLs.
4. Use the Migration page to upload existing media to R2 in the background.

**Requirements:**

* PHP 8.1 or higher
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

No. The plugin uses a lazy boot architecture: on frontend page views, only the lightweight URL rewriter loads. The AWS SDK and all admin classes are only loaded for admin, AJAX, and cron requests. Enable "Background Offload" to defer R2 uploads to WP-Cron so media uploads return instantly.

= What happens if I deactivate the plugin? =

Media URLs revert to your local server. Your files remain in R2 — nothing is deleted. Re-activate to resume serving from R2.

= What happens if I delete the plugin? =

The uninstaller removes all plugin data from the database (options, post meta, queue tables and cron events). Logs are never stored, so there are none to remove. Your R2 objects are NOT deleted — use Restore & Remove from R2 before deleting if you want to clean up R2.

= Can I restore files from R2 back to my server? =

Yes. Use the Restore feature on the Migration page, or the "Restore from R2" row action in the Media Library. A live progress bar tracks the download status.

= Can I fully disconnect from R2? =

Yes. Use the "Restore & Remove from R2" feature on the Migration page. It restores all files to the server, verifies each download, then deletes from R2 and clears all sync metadata.

= Is WooCommerce supported? =

Yes. Product images, gallery thumbnails, srcset attributes, WooCommerce REST API image URLs, HPOS, and Cart & Checkout Blocks are all supported. WooCommerce image regeneration is handled automatically.

= Does it work with multisite? =

Yes. URL caches are flushed on blog switches, and wp_upload_dir() is used per-blog.

= Can I exclude certain file types from being uploaded to R2? =

Yes. Go to Settings > Excluded MIME Types and enter one MIME type per line (e.g. `video/mp4`). Files matching those types will not be uploaded to R2.

= What if my encryption key changes? =

If you reset WordPress security keys in wp-config.php, your stored R2 secret key will become unreadable. Define `R2_OFFLOAD_ENCRYPTION_KEY` as a constant in wp-config.php to use a stable encryption key that survives salt changes.

== Screenshots ==

1. Settings page — R2 connection, delivery, and behavior configuration.
2. Migration page — bulk migration with real-time progress tracking.
3. Restore & desync — restore files from R2 and fully disconnect.
4. Stats page — daily upload chart and totals.
5. File manager — browse R2 objects grouped by image.

== Changelog ==

= 1.5.0 =
* Requirement: PHP 8.1+ (the bundled AWS SDK requires it; older PHP would fatal on first R2 call).
* Compatibility: WordPress 7.1 client-side media processing — upload sync now waits for the finalize pass, so attachments are never marked synced (or local files deleted) before their sub-sizes exist.
* Fixed: the full-resolution original of big images ("-scaled" uploads, metadata original_image) is now offloaded, restored and removed with the attachment.
* Fixed: Delete Local only removes files whose R2 key is confirmed, protecting originals of attachments synced by earlier versions.
* WooCommerce: REST product/variation saves re-sync gallery images too (variation galleries are core in WooCommerce 11.1).
* Fixed: WordPress 7.1 /finalize uploads only offloaded the scaled file — sync now uses the metadata being finalized, so every client-made size is uploaded.
* Fixed: WordPress 7.1 companion files (animated GIF video + poster, HEIC source image) are offloaded, so their CDN URLs no longer 404.
* Fixed: release zip used Windows "\" path separators (broke installs on Linux hosts); packaging now uses forward slashes and verifies every entry.
* New: redesigned Settings screen — status cards, four tabs, one Save bar, clear upload modes, live URL preview; "Serve from R2" now requires a public domain (it previously did nothing without one).
* New: redesigned Migration screen — storage overview, a single offload job with pause/resume and time estimate, one activity log, collapsible tools, and a typed-confirmation danger zone.
* Fixed: a failed restore download saved R2's error response as the image file, and later restores then skipped it as "present". Downloads now go to a temp file that is moved into place only on success.
* Fixed: restore, free-space, claim and disconnect jobs reported success even when items failed — failed rows are now kept and shown.
* Fixed: Media Library "Restore from R2" / "Delete local file" row links and status badges did nothing on the Media screen (script and styles were not loaded there).
* New: redesigned Stats screen — KPI cards and daily chart with a 7 / 30-day range.
* Changed: logs are no longer stored anywhere. A "Live logs" switch (Stats and Migration screens) streams activity while it is on; switching it off deletes everything shown, and the session expires on its own if the page is closed. Log files kept by earlier versions are deleted on upgrade.
* Fixed: the Stats "Failures" count was always 0 — failed syncs are now counted.
* Tested with WordPress 7.1.3 and WooCommerce 11.2.1.

= 1.3.1 =
* New: Restore & Remove from R2 — fully disconnect from R2 by restoring all files to the server, verifying downloads, then deleting from R2 and clearing all sync metadata.
* New: Restore progress polling — bulk restore now shows live progress with 3-second polling.
* New: Desync status AJAX endpoint for real-time progress tracking.
* New: Background page refresh — stats cards and button visibility auto-update every 10 seconds on the migration page.
* Fixed: Progress bar percentage overcounting — local-delete and restore now count per attachment instead of per individual file.
* Fixed: Stale progress status after completion — all operations now clean up their tracking data on completion.
* Fixed: Cancel migration now properly hides all action buttons and resets the progress bar.
* Fixed: Start migration with nothing to sync no longer shows Pause/Cancel/Run Now buttons.
* Fixed: Button text stuck on loading state after AJAX actions.
* Fixed: Restore and local-delete buttons no longer start polling when there is nothing to process.
* Improved: Log timestamps now use WordPress timezone instead of UTC.
* Improved: Log filenames now rotate based on WordPress local date.

= 1.1.0 =
* New: Restore files from R2 to server — single attachment (row action), bulk selected, restore missing, or restore all.
* New: Auto-delete local files per-upload (automatic) and bulk delete for entire synced library.
* New: Media Library R2 Status column with Synced / R2 only / Not synced / Error badges.
* New: Media Library row actions — Restore from R2 / Delete local file (AJAX, no page reload).
* New: Media Library bulk actions — R2: Restore to server / R2: Delete local files.
* New: Three independent WP-Cron batch engines (migration, bulk restore, bulk local-delete) each with their own lock and progress tracking.
* Fixed: WooCommerce compatibility — HPOS declaration, REST API URL rewriting, lazy image size regeneration handling.
* Fixed: Multipart upload threshold sanitizer now correctly converts MB to bytes.
* Fixed: Multisite URL cache no longer stale after switch_to_blog().

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

= 1.5.0 =
Requires PHP 8.1+. Adds WordPress 7.1 / WooCommerce 11.1 compatibility and offloads full-resolution originals of large images.

= 1.3.1 =
Adds Restore & Remove from R2 feature, fixes progress bar bugs, and adds live dashboard auto-refresh. Recommended for all users.

= 1.1.0 =
Adds restore from R2, auto-delete local files, Media Library integration with R2 Status column and row/bulk actions, and WooCommerce compatibility fixes.

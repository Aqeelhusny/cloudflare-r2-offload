# Cloudflare R2 Offload

WordPress plugin that offloads your entire media library to **Cloudflare R2** object storage. Supports custom CDN domains, bulk migration of existing media, restore files from R2 back to the server, auto-delete local files after upload, full restore & desync from R2, WooCommerce compatibility, an advanced file manager, upload stats, and optimized multipart uploads.

---

## Features

- **Full media offload** — uploads the original file and every registered image size (thumbnail, medium, large, custom sizes) using the same `YYYY/MM/` directory structure WordPress uses
- **New uploads** — automatically syncs to R2 the moment a file is uploaded, after all image sizes have been generated
- **Background offload** — optionally queue new uploads for WP-Cron processing instead of syncing inline, keeping media upload responses fast on slow or high-latency connections
- **Bulk migration** — migrates your entire existing media library in the background via WP-Cron batches with Start / Pause / Resume / Cancel / Retry controls
- **Restore from R2 to server** — download files from R2 back to the local server at any time; supports single attachment, bulk selected, or restore all
- **Auto-delete local files** — free up server disk space by deleting local copies of files already safely stored on R2; works per-upload automatically or as a bulk operation for your entire library
- **Restore & Remove from R2** — fully disconnect from R2 by restoring all files to the server, verifying each download, then deleting from R2 and clearing all sync metadata
- **Custom CDN domain** — serve files from your own domain (e.g. `cdn.yourdomain.com`) instead of the R2 public URL
- **URL rewriting** — rewrites all URLs: attachment URLs, srcset, `the_content`, and WooCommerce product image responses
- **WooCommerce compatible** — handles WooCommerce image sizes, REST API responses, HPOS, Cart & Checkout Blocks, and lazy-regenerated sizes
- **Optimized multipart upload** — files under 5 MB use a single request; larger files use AWS SDK `MultipartUploader` with parallel part uploads and automatic retry (up to 3 attempts with exponential backoff)
- **Advanced file manager** — browse, filter, copy URLs, and delete objects directly in the R2 bucket (enable/disable toggle)
- **Upload stats dashboard** — 30-day chart of uploads, bytes offloaded, and failures
- **Structured logging** — JSON-lines log files using WordPress timezone with in-admin log viewer and one-click delete
- **Secure credential storage** — secret key encrypted at rest with AES-256-CBC; never echoed back to the browser
- **Media Library integration** — R2 Status column, per-attachment row actions, and bulk actions directly in the WordPress Media Library
- **Live dashboard** — migration page auto-refreshes stats every 10 seconds; all operations show real-time progress with polling
- **Auto-cleanup on delete** — when a media item is deleted from WordPress, its R2 copies are automatically removed
- **MIME type exclusions** — skip specific file types (e.g. `video/mp4`) from being uploaded to R2
- **Lazy boot** — only the lightweight URL rewriter loads on frontend page views; the full stack (AWS SDK, admin classes) only loads for admin, AJAX, cron, and REST requests
- **Deferred frontend uploads** — if a front-end form plugin triggers a media upload, the full sync stack boots on demand via a lazy hook

---

## Requirements

| Requirement | Minimum |
|---|---|
| PHP | 7.4 |
| WordPress | 5.8 |
| WooCommerce *(optional)* | 6.0 |
| Cloudflare account | Free tier or above |
| Composer | 2.x (for development / building) |

---

## Installation

### Option A — Upload the built plugin (recommended for production)

1. Download or clone this repository
2. Run `composer install --no-dev --optimize-autoloader` inside the `cloudflare-r2-offload/` directory
3. Zip the entire `cloudflare-r2-offload/` directory
4. In WordPress Admin go to **Plugins → Add New → Upload Plugin** and upload the zip
5. Activate **Cloudflare R2 Offload**

### Option B — Direct folder copy

1. Copy the `cloudflare-r2-offload/` directory into `wp-content/plugins/`
2. Ensure the `vendor/` directory is present (run `composer install --no-dev` if not)
3. Activate the plugin from **Plugins → Installed Plugins**

> **Note:** The `vendor/` directory is required. The plugin will show an admin notice and refuse to load if it is missing.

---

## Cloudflare R2 Setup

### 1. Create an R2 bucket

1. Log in to [Cloudflare Dashboard](https://dash.cloudflare.com)
2. Navigate to **R2 Object Storage → Create bucket**
3. Choose a bucket name (e.g. `my-site-media`) — must be lowercase letters, numbers, and hyphens only
4. Select a storage region or leave as **Automatic**

### 2. Generate R2 API credentials

1. Go to **R2 Object Storage → Manage R2 API Tokens**
2. Click **Create API Token**
3. Set permissions to **Object Read & Write** scoped to your bucket
4. Copy the **Access Key ID** and **Secret Access Key** — the secret is only shown once

### 3. (Optional) Set up a custom domain

To serve files from `cdn.yourdomain.com`:

1. In your R2 bucket settings go to **Settings → Custom Domains → Connect Domain**
2. Add your subdomain (e.g. `cdn.yourdomain.com`)
3. Cloudflare will automatically add the required DNS record if your domain is on Cloudflare

Alternatively, use a **Cloudflare Worker** or a standard CNAME to your R2 bucket's public hostname.

> **Recommended:** Do not enable the R2 public URL directly. Use a Cloudflare custom domain so files are served via Cloudflare's CDN edge network with caching.

---

## Plugin Configuration

Go to **R2 Offload → Settings** in your WordPress admin.

### R2 Connection

| Field | Description |
|---|---|
| Account ID | Your 32-character Cloudflare Account ID (found in the Cloudflare dashboard URL or Overview page) |
| Access Key ID | The R2 API token Access Key ID |
| Secret Access Key | The R2 API token Secret Access Key — stored encrypted, never echoed back |
| Bucket Name | Your R2 bucket name |

Click **Test Connection** to verify your credentials before saving.

### Delivery

| Field | Description |
|---|---|
| Custom Domain | Hostname only, no scheme — e.g. `cdn.yourdomain.com`. Leave empty to use the R2 public URL |
| URL Scheme | `https` (recommended) or `http` |
| Path Prefix | Object key prefix in R2. Should match your WordPress upload path — default: `wp-content/uploads` |

### Behavior

| Field | Default | Description |
|---|---|---|
| Auto-upload New Media | On | Sync every new upload to R2 immediately after WordPress generates all image sizes |
| Background Offload | Off | Queue new uploads for WP-Cron batch processing instead of syncing inline. Keeps upload responses fast on slow connections. When enabled, new uploads are inserted into the migration queue and processed by the batch processor within seconds |
| Delete Local Files | Off | Automatically delete local files after each confirmed upload to R2. **Irreversible without using Restore. Only enable if R2 is your sole storage.** |
| Enable File Manager | Off | Show the R2 File Manager and log viewer in the admin menu |
| Migration Batch Size | 10 | Attachments processed per WP-Cron batch (1–50). Lower values are safer on shared hosting |
| Multipart Upload Threshold | 5 MB | Files larger than this use multipart upload. Minimum 5 MB (AWS/R2 requirement) |
| Multipart Concurrency | 3 | Number of parallel part uploads per file (1–10) |
| Excluded MIME Types | — | One MIME type per line — these file types will not be uploaded to R2 (e.g. `video/mp4`) |

---

## Bulk Migration (Existing Media)

Go to **R2 Offload → Migration**.

1. The stats bar shows your total attachment count and how many are already synced
2. Click **Start Migration** — all unsynced attachments are queued in the database
3. WP-Cron processes them in batches in the background
4. The progress bar updates every 3 seconds automatically
5. Use **Pause** / **Resume** to control the migration without losing progress
6. Use **Cancel** to stop and clear the queue entirely
7. If some items fail after 3 retries they are marked **Failed** — click **Retry Failed** to re-queue them
8. When migration completes, the queue table is automatically truncated and the UI resets

The stats cards (Total Attachments, Synced to R2, In Queue, Failed) auto-refresh every 10 seconds while you are on the page.

> **Large libraries:** For sites with 10,000+ attachments, increase PHP memory limit (`define('WP_MEMORY_LIMIT', '256M')`) and ensure WP-Cron is running reliably (consider a real cron job calling `wp-cron.php` instead of the default browser-triggered cron).

---

## Restore Files from R2 to Server

The restore feature downloads files from R2 back to the local server. Use it if you previously deleted local files and need to recover them, want to switch hosting providers, or plan to stop using R2.

Go to **R2 Offload → Migration → Restore Files from R2 to Server**.

### Options

| Button | What it does |
|---|---|
| **Restore Missing Files from R2** | Downloads only files marked as R2-only (local copy was deleted). Fastest and safest option for recovery. |
| **Restore ALL Synced Files from R2** | Re-downloads every synced attachment regardless of whether a local copy exists. Use for full server-side recovery. |

Both options queue a WP-Cron background job so large libraries do not time out. A progress bar shows live status with 3-second polling.

### Single attachment restore

In the **Media Library** (list view):

- Attachments with no local copy show a **blue "R2 only"** badge in the R2 Status column
- Click the **Restore from R2** row action to download that file back immediately (AJAX — no page reload)
- Select multiple attachments and use **Bulk Actions → R2: Restore to server**

### How it works internally

The plugin reads the `_r2_offload_keys` post meta (the list of all R2 object keys for that attachment), derives the correct local path for each key, creates any missing `YYYY/MM/` subdirectories, and streams the file down using `GetObject` with `SaveAs` — so large files never exhaust PHP memory. Files that already exist locally are skipped.

---

## Auto-Delete Local Files

Reclaim server disk space by removing local copies of files that are safely stored on R2.

> **This is irreversible without using the Restore feature.** Ensure your R2 bucket and CDN are working correctly before proceeding.

### Option 1 — Per-upload (automatic)

Enable **Settings → Behavior → Delete Local Files**. Every file is deleted from the server immediately after a confirmed upload to R2. The `_r2_offload_local_deleted` post meta is set to `1` so the Media Library shows the correct status.

### Option 2 — Bulk delete (for existing synced media)

For sites that completed migration before enabling the auto-delete setting, or that want to free up space after a bulk migration:

Go to **R2 Offload → Migration → Delete Local Files (Free Up Server Space)** and click **Delete Local Files for All Synced Attachments**.

This queues a WP-Cron background job that processes attachments in batches. A live progress bar shows status. Only attachments confirmed synced to R2 (`_r2_offload_synced = 1`) are processed — unsynced attachments are never touched.

### Option 3 — Single attachment

In the **Media Library** (list view):

- Synced attachments that still have a local copy show a **"Delete local file"** row action (in red)
- Click it to delete the local copy immediately (AJAX — no page reload). The row action changes to **Restore from R2** automatically.
- Select multiple attachments and use **Bulk Actions → R2: Delete local files**

### R2 Status column

The Media Library gains an **R2 Status** column showing:

| Badge | Colour | Meaning |
|---|---|---|
| Synced | Green | File is on R2 and local copy exists |
| R2 only | Blue | File is on R2, local copy has been deleted |
| Not synced | Grey | File has not been uploaded to R2 |
| Error | Red | Last upload attempt failed (hover for details) |

---

## Restore & Remove from R2 (Full Desync)

Use this to fully disconnect from R2 — restore all files to the server and delete them from R2.

Go to **R2 Offload → Migration → Restore & Remove from R2**.

Click **Restore & Remove All from R2** to start the process.

### How it works (per attachment)

1. **Restore** — downloads all files (original + all thumbnail sizes) from R2 to the local server
2. **Verify** — checks every file actually exists locally after download. If any file is missing, that attachment is skipped and R2 copies are **not** deleted (safety net)
3. **Delete from R2** — removes all R2 objects for the attachment
4. **Clean metadata** — removes all `_r2_offload_*` post meta so the attachment is fully desynced

This runs as a WP-Cron background job with live progress. Failed attachments are counted separately so you can investigate via the error log.

> **Warning:** This empties your R2 bucket for all synced attachments. After completion, files only exist on the local server. This is intended for migrating away from R2 entirely.

---

## File Manager

Enable via **R2 Offload → Settings → Enable File Manager**.

Once enabled, the **File Manager** submenu appears with:

- Paginated list of all objects in your R2 bucket (50 per page)
- Prefix/folder navigation with filter bar
- **Copy URL** — copies the full CDN URL to clipboard
- **Delete** — removes the object from R2 (with confirmation)
- **Activity Logs** panel showing the last 20 log entries
- **Delete Logs** button — removes all local log files (with confirmation)

---

## Stats Dashboard

Go to **R2 Offload → Stats**.

Shows a 30-day bar chart of daily upload counts and failures, plus summary cards:

- Total files currently on R2
- Uploads in the last 30 days
- Total bytes offloaded in the last 30 days
- Total failures in the last 30 days

---

## Media Library Integration

The plugin integrates directly into the WordPress Media Library list view with no separate page needed for common single-file operations.

### R2 Status column

Visible at a glance for every attachment — see badge descriptions in the [Auto-Delete Local Files](#auto-delete-local-files) section above.

### Row actions

Available when hovering over an attachment in list mode:

| Action | Shown when | What it does |
|---|---|---|
| Restore from R2 | Local file deleted (R2 only) | Downloads file back from R2 to server (AJAX) |
| Delete local file | Synced, local copy exists | Deletes local copy, marks as R2 only (AJAX) |

### Bulk actions

Available in the bulk action dropdown:

| Bulk Action | What it does |
|---|---|
| R2: Restore to server | Restores selected synced attachments from R2 |
| R2: Delete local files | Deletes local copies of selected synced attachments |

Results are shown as an admin notice with restored/deleted counts and any failure warnings.

---

## WooCommerce Compatibility

The plugin is fully compatible with WooCommerce and declares:

- **HPOS** (High-Performance Order Storage) compatibility
- **Cart & Checkout Blocks** compatibility

### What is covered

| WooCommerce Feature | How it's handled |
|---|---|
| Product images | `wp_get_attachment_image_src` filter — same as standard WP images |
| Product gallery thumbnails | `woocommerce_single_product_image_thumbnail_html` filter |
| WooCommerce image sizes (`woocommerce_thumbnail`, `woocommerce_single`, `woocommerce_gallery_thumbnail`) | Detected automatically in `$metadata['sizes']` — uploaded with all other sizes |
| REST API product image URLs | `woocommerce_rest_prepare_product_object` and `woocommerce_rest_prepare_product_variation_object` filters |
| WooCommerce image regeneration | Re-sync only uploads genuinely new sizes; already-uploaded files are skipped |
| WooCommerce placeholder image | Never rewritten — it has no attachment ID |
| Multisite + `switch_to_blog()` | URL caches invalidated correctly per blog |

---

## How URL Rewriting Works

When a file is synced to R2, the attachment's `_r2_offload_synced` post meta is set to `1`.

Every WordPress URL filter checks this meta:

```
wp_get_attachment_url(123)
    → UrlRewriter::rewrite_url()
        → is_synced(123) === true
        → str_replace(
              "https://yoursite.com/wp-content/uploads",
              "https://cdn.yourdomain.com/wp-content/uploads",
              $url
          )
        → "https://cdn.yourdomain.com/wp-content/uploads/2024/03/photo.jpg"
```

The same replacement is applied to srcset, `the_content`, product gallery HTML, and REST API responses.

If a file has **not** been synced, the original local URL is returned unchanged — the site continues to work normally during and after a partial migration.

---

## Multipart Upload

Files below the configured threshold (default 5 MB) use a standard single-request `PutObject`.

Files at or above the threshold use `Aws\S3\MultipartUploader`:

- Part size: 5 MB (minimum allowed by R2/S3)
- Concurrency: configurable (default 3 parallel parts)
- On failure: automatic `AbortMultipartUpload` + up to 3 retry attempts with exponential backoff
- Both part size and concurrency are filterable:
  ```php
  add_filter( 'r2_offload_multipart_part_size',   fn() => 10 * 1024 * 1024 ); // 10 MB parts
  add_filter( 'r2_offload_multipart_concurrency', fn() => 5 );
  ```

---

## Developer Filters & Actions

```php
// Change migration batch size programmatically.
add_filter( 'r2_offload_batch_size', fn() => 20 );

// Change multipart upload threshold (in bytes).
add_filter( 'r2_offload_multipart_threshold', fn() => 25 * 1024 * 1024 ); // 25 MB

// Change multipart part size (in bytes, min 5 MB).
add_filter( 'r2_offload_multipart_part_size', fn() => 10 * 1024 * 1024 );

// Change multipart concurrency.
add_filter( 'r2_offload_multipart_concurrency', fn() => 5 );

// Fired when the upload migration queue is fully drained.
add_action( 'r2_offload_migration_complete', function () {
    // e.g. send a Slack notification
} );

// Fired when a bulk restore job finishes.
add_action( 'r2_offload_restore_complete', function () {
    // e.g. log to an external service
} );

// Fired when a bulk local-delete job finishes.
add_action( 'r2_offload_local_delete_complete', function () {
    // e.g. update a server monitoring metric
} );

// Fired when a bulk restore & desync job finishes.
add_action( 'r2_offload_desync_complete', function () {
    // e.g. notify that R2 disconnection is complete
} );
```

---

## Post Meta Reference

The plugin stores the following post meta keys on each attachment post:

| Meta Key | Value | Description |
|---|---|---|
| `_r2_offload_synced` | `1` | Attachment is fully synced to R2 |
| `_r2_offload_keys` | JSON array | All R2 object keys for this attachment (original + every size) |
| `_r2_offload_synced_at` | Unix timestamp | Time of last successful sync |
| `_r2_offload_local_deleted` | `1` | Local files have been deleted; file lives on R2 only |
| `_r2_offload_retry_count` | integer | Number of failed upload attempts |
| `_r2_offload_error` | string | Last error message from a failed sync |

---

## Security

- **Credential encryption:** The R2 secret key is encrypted with AES-256-CBC using `wp_salt('auth')` as the key material before being stored in `wp_options`. It is never echoed back to the browser — the settings form shows a placeholder. To use a stable encryption key that survives WordPress salt changes, define `R2_OFFLOAD_ENCRYPTION_KEY` in `wp-config.php`.
- **Nonce verification:** Every AJAX endpoint verifies `wp_nonce` via `check_ajax_referer()`.
- **Capability check:** All admin pages and AJAX endpoints require `manage_options`.
- **Output escaping:** All admin output uses `esc_html()`, `esc_attr()`, `esc_url()`.
- **Restore safety:** `restore_from_r2()` only downloads files whose keys are recorded in `_r2_offload_keys` — no arbitrary path traversal is possible.
- **Desync safety:** `restore_and_desync_attachment()` verifies every file exists locally before deleting from R2 — if any download failed, R2 copies are preserved.
- **Delete safety:** `delete_local_for_attachment()` checks `_r2_offload_synced = 1` before deleting anything — unsynced attachments are never touched.
- **Vendor directory:** The `vendor/` directory contains a `.htaccess` with `deny from all` to prevent direct PHP execution.
- **Log directory:** The local log directory (`wp-content/uploads/r2-offload-logs/`) is protected by `.htaccess` and `index.php`.

---

## Uninstalling

Deactivating the plugin stops all background processing and clears scheduled cron events. Your R2 files and WordPress media library are left untouched.

**Deleting** the plugin via WordPress admin triggers `uninstall.php`, which:

- Drops the `{prefix}r2_offload_migration_queue` and `{prefix}r2_offload_bulk_queue` database tables
- Deletes all `r2_offload_*` options from `wp_options` (including restore, local-delete, and desync queue state)
- Deletes all `_r2_offload_*` post meta from `wp_postmeta`
- Clears all scheduled cron events (migration, restore, local-delete, desync)
- Deletes all local log files from `wp-content/uploads/r2-offload-logs/`

> **R2 objects are NOT deleted** — your files remain in R2 and continue to be served from your CDN. If you want to clean up R2 objects, use the Restore & Remove from R2 feature or the File Manager before deleting the plugin, or manage them directly in the Cloudflare dashboard.

---

## File Structure

```
cloudflare-r2-offload/
├── cloudflare-r2-offload.php          # Plugin bootstrap, constants, HPOS declaration
├── composer.json                       # AWS SDK v3 + Strauss dependency config
├── build.php                           # Build automation for Strauss namespace prefixing
├── find-deps.php                       # Utility to identify required AWS service packages
├── uninstall.php                       # Cleanup on plugin deletion
├── vendor/                             # Composer dependencies (dev + runtime)
├── lib/vendor/                         # Strauss-scoped AWS SDK (prefixed to avoid conflicts)
├── includes/
│   ├── class-plugin.php               # Singleton orchestrator, DB migrations
│   ├── class-settings.php             # Settings registration, sanitization, AES-256-CBC encryption
│   ├── class-r2-client.php            # S3Client wrapper (upload, download, delete, list)
│   ├── class-attachment-sync.php      # Upload, restore, desync, and local-delete per attachment
│   ├── class-upload-handler.php       # WP/WooCommerce upload + delete hooks, background offload
│   ├── class-url-rewriter.php         # URL rewriting filters (WP + WooCommerce + multisite)
│   ├── class-media-library.php        # Media Library column, row actions, bulk actions
│   ├── class-migration.php            # All AJAX handlers (migration, restore, local-delete, desync)
│   ├── class-batch-processor.php      # WP-Cron engines for migration, restore, local-delete, desync
│   └── class-error-logger.php         # JSON-lines structured logger (WordPress timezone)
├── admin/
│   ├── class-admin.php                # Menu registration + asset enqueue
│   ├── class-settings-page.php        # Settings form
│   ├── class-migration-page.php       # Migration, restore, local-delete, and desync dashboard
│   ├── class-stats-page.php           # Stats chart
│   └── class-file-manager-page.php    # R2 file browser + log viewer
├── assets/
│   ├── css/admin.css
│   └── js/admin.js                    # Migration, restore, local-delete, desync, file manager JS
├── tests/                              # Unit and integration tests
│   ├── bootstrap.php
│   ├── bootstrap-connection.php
│   ├── test-attachment-sync.php
│   └── test-connection-migration.php
└── languages/                          # i18n translation files
    └── cloudflare-r2-offload.pot
```

---

## Changelog

### 1.3.1
- **New:** Restore & Remove from R2 — fully disconnect from R2 by restoring all files to the server, verifying downloads, then deleting from R2 and clearing all sync metadata
- **New:** Restore progress polling — bulk restore now shows live progress with 3-second polling
- **New:** Desync status AJAX endpoint for real-time progress tracking
- **New:** Background page refresh — stats cards and button visibility auto-update every 10 seconds on the migration page
- **Fix:** Progress bar percentage overcounting — local-delete and restore now count per attachment instead of per individual file
- **Fix:** Stale progress status after completion — all operations (migration, restore, local-delete, desync) now clean up their tracking options/table on completion
- **Fix:** Cancel migration now properly hides all action buttons and resets the progress bar
- **Fix:** Start migration with nothing to sync no longer shows Pause/Cancel/Run Now buttons
- **Fix:** Button text stuck on loading state after AJAX actions — now properly restored on completion
- **Fix:** Restore and local-delete buttons no longer start polling when there is nothing to process
- **Improved:** Log timestamps now use WordPress timezone instead of UTC
- **Improved:** Log filenames now rotate based on WordPress local date

### 1.1.0
- **New:** Restore files from R2 to server — single attachment (row action), bulk selected, restore missing, or restore all
- **New:** Auto-delete local files per-upload (automatic) and bulk delete for entire synced library
- **New:** Media Library R2 Status column with Synced / R2 only / Not synced / Error badges
- **New:** Media Library row actions — Restore from R2 / Delete local file (AJAX, no page reload)
- **New:** Media Library bulk actions — R2: Restore to server / R2: Delete local files
- **New:** `_r2_offload_local_deleted` post meta tracking
- **New:** Three independent WP-Cron batch engines (migration, bulk restore, bulk local-delete) each with their own lock and progress tracking
- **Fix:** WooCommerce compatibility — HPOS declaration, REST API URL rewriting, lazy image size regeneration handling
- **Fix:** Multipart upload threshold sanitizer now correctly converts MB to bytes
- **Fix:** Multisite URL cache no longer stale after `switch_to_blog()`

### 1.0.1
- **Fix:** Migration INSERT query column mismatch causing silent failures on MySQL strict mode
- **Fix:** Double-encryption of secret key when saving via AJAX then submitting the settings form
- **Improved:** Batch processor now loops continuously within a 50-second window for faster bulk migrations
- **Improved:** Added `spawn_cron()` calls for reliable WP-Cron triggering on all hosts
- **New:** "Process Batch Now" button for manual batch processing when WP-Cron is unreliable
- **New:** "Serve from Cloudflare R2" toggle for instant CDN on/off switching
- **New:** Live stat updates during migration polling
- **New:** Image-based nested tree view in File Manager

### 1.0.0
- Initial release
- Full media library offload to Cloudflare R2
- Bulk migration with WP-Cron batching (pause/resume/retry)
- Custom CDN domain URL rewriting
- Optimized multipart upload with configurable threshold and concurrency
- Advanced file manager with R2 object browser
- 30-day upload stats dashboard
- Structured JSON-lines logging with in-admin viewer

---

## License

GPL-2.0+. See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html).

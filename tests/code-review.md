# Code Review — Cloudflare R2 Offload Plugin

**Reviewed by:** Senior Principal Engineer analysis  
**Date:** 2026-05-20  
**Version:** 1.4.0  

---

## Summary

| Severity | Count |
|----------|-------|
| Critical | 0 |
| High     | 1 |
| Medium   | 3 |
| Low      | 4 |
| Info     | 5 |
| **Total**| **13** |

Overall code quality is high. The plugin follows WordPress coding standards, uses typed PHP 7.4+ features correctly, and handles edge cases (retry logic, race conditions, multipart uploads) well. Issues below are improvements, not breakages.

---

## High

### H1: Stub/Production API Mismatch — `delete_files()` return type
**File:** `tests/stubs.php:32`, `tests/stubs-r2-logger.php:32`  
**vs.** `includes/class-r2-client.php:95`

**Issue:** Both stub files declare `delete_files()` as returning `void`. The real `R2Client::delete_files()` returns `bool`. Any future caller in production code that relies on the return value (`if (!$this->r2->delete_files($keys))`) will not be caught by unit tests because stubs swallow the return value.

Currently `AttachmentSync::desync_attachment()` calls `$this->r2->delete_files($keys)` without checking the return value, so this is not a live bug — but it's a reliability hazard for future callers.

**Fix:** Update both stubs to return `bool`:
```php
// stubs.php and stubs-r2-logger.php
public function delete_files( array $keys ): bool {
    $this->deleted_keys = array_merge( $this->deleted_keys, $keys );
    return true; // configurable: add $this->delete_returns = true
}
```

---

## Medium

### M1: `Plugin::boot()` accesses `$this->logger` before assignment in deferred path
**File:** `includes/class-plugin.php:74-77`

```php
add_filter( 'wp_generate_attachment_metadata', function ( $metadata, $id ) {
    if ( ! $this->logger ) {   // <-- $this->logger is typed ErrorLogger, not ?ErrorLogger
        $this->boot_full();
    }
    return $this->upload_handler->on_generate_metadata( $metadata, $id );
}, 20, 2 );
```

**Issue:** `$this->logger` is declared `public ErrorLogger $logger` (not nullable), but is never initialized in `__construct` or `boot()` before `boot_full()` runs. In PHP 8.0+ accessing an uninitialized typed property throws `Error: Typed property must not be accessed before initialization`. In PHP 7.4 this is a warning. The `if ( ! $this->logger )` check is intended to guard this, but in strict mode it will throw before the check completes.

**Fix:** Declare `logger` as nullable or use `isset()`:
```php
// Option A: make it nullable
public ?ErrorLogger $logger = null;

// Option B: use isset()
if ( ! isset( $this->logger ) ) {
```

### M2: `flush_url_cache()` is a no-op with misleading comment
**File:** `includes/class-url-rewriter.php:166-169`

```php
public function flush_url_cache(): void {
    // No instance properties to clear — we compute on demand ...
    // This method exists as a hook target so subclasses or future caching can hook in.
}
```

**Issue:** The `switch_blog` action is registered (`add_action( 'switch_blog', [ $this, 'flush_url_cache' ] )`) but the method body is empty. If `get_local_base()` or `get_cdn_base()` ever starts caching in instance properties (a natural optimization), this flush will do nothing and multisite blogs will serve wrong URLs until the request ends.

**Fix:** Either:
- Add `private ?string $local_base_cache = null;` and `private ?string $cdn_base_cache = null;`, use them in the getters, and clear them in `flush_url_cache()`.
- Or remove the `switch_blog` hook registration and the empty method entirely to avoid false safety.

### M3: Batch processor direct SQL IN clause not fully prepared
**File:** `includes/class-batch-processor.php:476-481`

```php
$in_clause = implode( ',', array_map( 'absint', $ids ) );
$wpdb->query(
    $wpdb->prepare(
        "UPDATE `{$table}` SET status = 'processing', updated_at = %s WHERE id IN ({$in_clause})",
        $now
    )
);
```

**Issue:** The IN clause is built by string interpolation. While `absint()` ensures the values are safe integers, `wpdb->prepare()` doesn't validate the IN clause, and static analysis tools (PHPCS, PHPStan) will flag this as a potential SQL injection. It is safe in practice because `absint()` returns `int`, but it violates the "never interpolate into SQL" principle, making audits harder.

**Fix:** Use `vsprintf` with per-ID placeholders, or use the documented two-pass approach already noted in the docblock — but actually implement it consistently:
```php
$placeholders = implode( ',', array_fill( 0, count( $ids ), '%d' ) );
$wpdb->query(
    $wpdb->prepare(
        "UPDATE `{$table}` SET status = 'processing', updated_at = %s WHERE id IN ({$placeholders})",
        array_merge( [ $now ], $ids )
    )
);
```

---

## Low

### L1: `check_key()` not in stubs — only tested in live integration tests
**File:** `tests/stubs.php`, `tests/stubs-r2-logger.php`

`R2Client::check_key()` is used in `AttachmentSync::validate_pre_uploaded()` but neither stub implements it. This means the validate path is not covered by unit tests — only by the live test. Add to stubs:

```php
public string $check_key_returns = 'found';
public function check_key( string $r2_key ): string {
    return $this->check_key_returns;
}
```

### L2: `test_connection()` uses `listObjectsV2` not `headBucket` — comment explains why, but wrong exception branch
**File:** `includes/class-r2-client.php:218`

The comment explains that `HeadBucket` requires Admin Read. Correct. However, `listObjectsV2` with the wrong credentials returns a `403 AccessDenied` AwsException, not a `404`. The catch block returns the `AwsErrorCode`, which could be confusing — `AccessDenied` looks like a credentials error but may also mean the bucket name is wrong and you happen to lack ACL visibility. This is an information quality issue, not a bug.

**Fix:** Add a note in the error message distinguishing `AccessDenied` from other codes:
```php
$code = $e->getAwsErrorCode();
$hint = ( $code === 'AccessDenied' ) ? ' (wrong bucket name or insufficient token permissions)' : '';
```

### L3: `sanitize_bucket()` regex requires 3+ character bucket names
**File:** `includes/class-settings.php:212`

```php
if ( $value && ! preg_match( '/^[a-z0-9][a-z0-9\-]{1,61}[a-z0-9]$/', $value ) ) {
```

The regex `[a-z0-9\-]{1,61}` requires at least 1 middle character, so the minimum total length is 3. R2 follows S3 rules: bucket names must be 3–63 characters — so this is correct behavior. However, it silently accepts the input without adding a settings error when it fails; it just passes through the invalid value. Actually on re-reading: the condition adds a settings error when the regex does NOT match. The regex is correct. **No action needed** — this is an info note.

### L4: `wp_stubs.php` missing `gmdate` stub
**File:** `tests/wp-stubs.php`

`AttachmentSync::record_stat()` calls `gmdate('Y-m-d')`. PHP's native `gmdate()` exists, so this works. But it means the stat key in unit tests depends on the real system date, which could cause flaky tests if a test suite runs across midnight. **Low priority.**

---

## Info

### I1: `Plugin::$sync` and `$r2` are `public` — dependency inversion exposure
**File:** `includes/class-plugin.php:14-18`

Making service instances public enables external code (themes, other plugins) to bypass the settings guard and call R2 operations directly. Consider making them `protected` or providing a controlled accessor.

### I2: No input validation on `check_ajax_referer` in `class-migration.php`
Not reviewed (file not in scope) — ensure all AJAX handlers verify nonce before processing attachment IDs. Confirm `absint($_POST['attachment_id'])` before use.

### I3: `Settings::$cache` is per-request only
Works correctly for request lifecycle. Just note: cached values are not invalidated when another process updates options (e.g., WP-CLI). `flush_cache()` must be called explicitly after programmatic option updates.

### I4: PHP 8.0 named arguments not used — opportunity
The plugin targets PHP 7.4+ so named arguments (PHP 8.0) can't be used. This is correct behavior. Just flagging for future consideration when minimum PHP is bumped.

### I5: No `declare(strict_types=1)` in production classes
Adding `declare(strict_types=1)` to all class files would catch type coercion bugs at development time. Low effort, high signal improvement for a PHP 7.4+ codebase.

---

## Positive Observations

- **Retry logic** (3 attempts with backoff) in both `single_upload` and `multipart_upload` is well-implemented.
- **Secret key encryption** (AES-256-CBC, `r2enc:` prefix, round-trip idempotency) is correct and handles the `__R2_SECRET_UNCHANGED__` placeholder properly.
- **WooCommerce re-sync** via `woocommerce_rest_insert_product_object` correctly guards on `_r2_offload_synced === '1'` before re-syncing to avoid double work.
- **Batch processor** stale-row recovery (`status = 'pending' WHERE updated_at < stale_cutoff`) prevents stuck queues after crashes.
- **URL rewriter** short-circuits at `register_hooks()` when serving is disabled — zero filter overhead on frontend pages.
- **AttachmentSync diff logic** (`existing_keys_set` array flip) correctly handles WooCommerce lazy size generation by only uploading genuinely new keys.
- **Multisite awareness** in `UrlRewriter` via `switch_blog` hook (even if currently a no-op body).
- **Test infrastructure** is solid — both a stub-based unit test harness and a real credential integration test.

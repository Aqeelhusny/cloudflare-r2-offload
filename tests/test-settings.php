<?php
/**
 * Tests for Settings — encryption, sanitization, validation.
 *
 * Covers:
 * - AES-256-CBC encryption with HMAC-SHA256 authentication
 * - Backwards compatibility with legacy (non-HMAC) encrypted values
 * - Input sanitization for all credential fields
 * - MIME type filtering and validation
 * - Numeric option boundaries (batch_size, concurrency, multipart_threshold)
 *
 * Run: php tests/test-settings.php
 */

require_once __DIR__ . '/wp-stubs.php';
require_once __DIR__ . '/TestRunner.php';
require_once __DIR__ . '/../includes/class-settings.php';

use R2Offload\Settings;

$t = new TestRunner();

// =============================================================================
// Helpers
// =============================================================================

function reset_settings_state(): void {
    $GLOBALS['__wp_options']  = [];
    $GLOBALS['__wp_postmeta'] = [];
}

// =============================================================================
// 1. Encryption / Decryption
// =============================================================================

$t->section( '1. Encryption — HMAC-authenticated AES-256-CBC' );

reset_settings_state();
$s = new Settings();

// 1.1 Encrypt → decrypt round-trip
$secret = 'my-super-secret-key-abc123';
$encrypted = $s->sanitize_secret_key( $secret );
$t->assertStringContains( 'r2enc:', $encrypted, '1.1 Encrypted value has r2enc: prefix' );
$t->assertStringNotContains( $secret, $encrypted, '1.1 Plaintext not visible in ciphertext' );

// Store and retrieve
update_option( 'r2_offload_secret_access_key', $encrypted );
$s->flush_cache();
$decrypted = $s->get_secret_access_key();
$t->assertEqual( $secret, $decrypted, '1.2 Decrypt returns original plaintext' );

// 1.3 Empty input: returns stored value (or empty if none stored)
reset_settings_state();
$s2 = new Settings();
$t->assertEqual( '', $s2->sanitize_secret_key( '' ), '1.3 Empty input returns empty when nothing stored' );

// 1.4 Already-encrypted value is NOT re-encrypted
$double_encrypted = $s->sanitize_secret_key( $encrypted );
$t->assertEqual( $encrypted, $double_encrypted, '1.4 Already-encrypted value passes through unchanged' );

// 1.5 Different plaintexts produce different ciphertexts (random IV)
$enc_a = $s->sanitize_secret_key( 'secret-a' );
$enc_b = $s->sanitize_secret_key( 'secret-b' );
$t->assert( $enc_a !== $enc_b, '1.5 Different secrets produce different ciphertexts' );

// 1.6 Same plaintext encrypted twice produces different ciphertexts (random IV)
$enc_c = $s->sanitize_secret_key( 'same-value' );
$enc_d = $s->sanitize_secret_key( 'same-value' );
$t->assert( $enc_c !== $enc_d, '1.6 Same plaintext produces different ciphertexts (unique IV)' );

// 1.7 Corrupted ciphertext fails to decrypt (HMAC integrity check)
$corrupted = substr( $encrypted, 0, -4 ) . 'XXXX';
update_option( 'r2_offload_secret_access_key', $corrupted );
$s->flush_cache();
$result = $s->get_secret_access_key();
$t->assertEqual( '', $result, '1.7 Corrupted ciphertext returns empty (HMAC check fails)' );

// 1.8 Completely invalid base64 returns empty
update_option( 'r2_offload_secret_access_key', 'r2enc:!!!invalid!!!' );
$s->flush_cache();
$t->assertEqual( '', $s->get_secret_access_key(), '1.8 Invalid base64 returns empty' );

// 1.9 Legacy format (no HMAC) backwards compatibility
reset_settings_state();
$s2 = new Settings();
$key_source = 'test-salt-key-1234567890abcdef';
$key = substr( hash( 'sha256', $key_source, true ), 0, 32 );
$plaintext = 'legacy-secret-123';
$iv = openssl_random_pseudo_bytes( 16 );
$cipher = openssl_encrypt( $plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
$legacy_encrypted = 'r2enc:' . base64_encode( $iv . $cipher );

update_option( 'r2_offload_secret_access_key', $legacy_encrypted );
$s2->flush_cache();
$t->assertEqual( $plaintext, $s2->get_secret_access_key(), '1.9 Legacy (no HMAC) ciphertext decrypts via fallback' );

// 1.10 Whitespace-only secret: trimmed to empty, returns stored value
reset_settings_state();
$s3 = new Settings();
$result = $s3->sanitize_secret_key( '   ' );
// Trimmed to empty → returns whatever is stored (nothing → empty)
$t->assertEqual( '', $result, '1.10 Whitespace-only returns empty when nothing stored' );

// =============================================================================
// 2. Account ID Sanitization
// =============================================================================

$t->section( '2. Account ID Sanitization' );

reset_settings_state();
$s = new Settings();

// 2.1 Valid hex account ID
$t->assertEqual( 'abc123def456', $s->sanitize_account_id( 'abc123def456' ), '2.1 Valid hex passes through' );

// 2.2 Uppercased → lowercased
$t->assertEqual( 'abc123', $s->sanitize_account_id( 'ABC123' ), '2.2 Uppercased is lowered' );

// 2.3 Whitespace stripped
$t->assertEqual( 'abc123', $s->sanitize_account_id( '  abc123  ' ), '2.3 Whitespace stripped' );

// 2.4 Invalid chars: settings error added, value still returned (WP pattern)
$GLOBALS['__wp_settings_errors'] = [];
$result = $s->sanitize_account_id( 'abc-xyz!' );
$t->assertEqual( 'abc-xyz!', $result, '2.4 Non-hex value returned (WP settings error pattern)' );
$t->assert( count( $GLOBALS['__wp_settings_errors'] ) > 0, '2.4b Settings error was added' );

// 2.5 Empty input
$t->assertEqual( '', $s->sanitize_account_id( '' ), '2.5 Empty input returns empty' );

// =============================================================================
// 3. Bucket Sanitization
// =============================================================================

$t->section( '3. Bucket Sanitization' );

reset_settings_state();
$s = new Settings();

// 3.1 Valid bucket name
$t->assertEqual( 'my-bucket-123', $s->sanitize_bucket( 'my-bucket-123' ), '3.1 Valid bucket name passes' );

// 3.2 Whitespace stripped
$t->assertEqual( 'my-bucket', $s->sanitize_bucket( '  my-bucket  ' ), '3.2 Whitespace stripped' );

// 3.3 Invalid characters: settings error added, value returned (WP pattern)
$GLOBALS['__wp_settings_errors'] = [];
$result = $s->sanitize_bucket( 'my bucket/bad' );
$t->assertEqual( 'my bucket/bad', $result, '3.3 Invalid bucket: value returned (settings error pattern)' );
$t->assert( count( $GLOBALS['__wp_settings_errors'] ) > 0, '3.3b Settings error was added' );

// =============================================================================
// 4. Domain Sanitization
// =============================================================================

$t->section( '4. Domain Sanitization' );

reset_settings_state();
$s = new Settings();

// 4.1 Valid domain
$t->assertEqual( 'cdn.example.com', $s->sanitize_domain( 'cdn.example.com' ), '4.1 Valid domain passes' );

// 4.2 Protocol stripped
$t->assertEqual( 'cdn.example.com', $s->sanitize_domain( 'https://cdn.example.com' ), '4.2 Protocol stripped' );

// 4.3 Trailing slash stripped
$t->assertEqual( 'cdn.example.com', $s->sanitize_domain( 'cdn.example.com/' ), '4.3 Trailing slash stripped' );

// 4.4 Empty input
$t->assertEqual( '', $s->sanitize_domain( '' ), '4.4 Empty returns empty' );

// =============================================================================
// 5. Numeric Option Boundaries
// =============================================================================

$t->section( '5. Numeric Options (batch_size, concurrency, multipart_threshold)' );

reset_settings_state();
$s = new Settings();

// 5.1 Batch size — within bounds
$t->assertEqual( 5, $s->sanitize_batch_size( 5 ), '5.1 batch_size 5 valid' );

// 5.2 Batch size — below minimum clamped to 1
$t->assertEqual( 1, $s->sanitize_batch_size( 0 ), '5.2 batch_size 0 clamped to 1' );
$t->assertEqual( 5, $s->sanitize_batch_size( -5 ), '5.2b batch_size -5: absint gives 5' );

// 5.3 Batch size — above maximum clamped to 50
$t->assertEqual( 50, $s->sanitize_batch_size( 500 ), '5.3 batch_size 500 clamped to 50' );

// 5.4 Concurrency — within bounds
$t->assertEqual( 3, $s->sanitize_concurrency( 3 ), '5.4 concurrency 3 valid' );

// 5.5 Concurrency — boundaries
$t->assertEqual( 1, $s->sanitize_concurrency( 0 ), '5.5 concurrency 0 clamped to 1' );
$t->assertEqual( 10, $s->sanitize_concurrency( 50 ), '5.5b concurrency 50 clamped to 10' );

// 5.6 Multipart threshold — input is MB, output is bytes
$t->assertEqual( 5 * 1024 * 1024, $s->sanitize_multipart_threshold( 5 ), '5.6 5MB input → 5MB bytes output' );
$t->assertEqual( 10 * 1024 * 1024, $s->sanitize_multipart_threshold( 10 ), '5.6b 10MB input → 10MB bytes' );

// 5.7 Multipart threshold — minimum 5MB enforced
$t->assertEqual( 5 * 1024 * 1024, $s->sanitize_multipart_threshold( 0 ), '5.7 0 clamped to 5MB minimum' );
$t->assertEqual( 5 * 1024 * 1024, $s->sanitize_multipart_threshold( 3 ), '5.7b 3MB clamped to 5MB minimum' );

// =============================================================================
// 6. MIME Type Filtering
// =============================================================================

$t->section( '6. MIME Type Filtering' );

reset_settings_state();
$s = new Settings();

// 6.1 Valid MIME types parsed from newline-separated string
$result = $s->sanitize_mime_types( "image/png\nvideo/mp4\napplication/pdf" );
$t->assertEqual( [ 'image/png', 'video/mp4', 'application/pdf' ], $result, '6.1 Valid MIME list parsed (newline-separated)' );

// 6.2 Empty string returns empty array
$t->assertEqual( [], $s->sanitize_mime_types( '' ), '6.2 Empty string returns []' );

// 6.3 Whitespace-only entries filtered out
$result = $s->sanitize_mime_types( "image/jpeg\n  \n\ntext/plain" );
$t->assertEqual( [ 'image/jpeg', 'text/plain' ], $result, '6.3 Empty entries filtered' );

// 6.4 Array input also accepted
$result = $s->sanitize_mime_types( [ 'image/png', 'image/png' ] );
$t->assertEqual( [ 'image/png', 'image/png' ], $result, '6.4 Array input works' );

// =============================================================================
// 7. URL Scheme Sanitization
// =============================================================================

$t->section( '7. URL Scheme Sanitization' );

reset_settings_state();
$s = new Settings();

// 7.1 Valid schemes
$t->assertEqual( 'https', $s->sanitize_scheme( 'https' ), '7.1 https valid' );
$t->assertEqual( 'http', $s->sanitize_scheme( 'http' ), '7.1b http valid' );

// 7.2 Invalid scheme defaults to https
$t->assertEqual( 'https', $s->sanitize_scheme( 'ftp' ), '7.2 Invalid scheme defaults to https' );
$t->assertEqual( 'https', $s->sanitize_scheme( '' ), '7.2b Empty scheme defaults to https' );

// =============================================================================
// 8. Path Prefix Sanitization
// =============================================================================

$t->section( '8. Path Prefix Sanitization' );

reset_settings_state();
$s = new Settings();

// 8.1 Normal prefix
$t->assertEqual( 'wp-content/uploads', $s->sanitize_path_prefix( 'wp-content/uploads' ), '8.1 Normal prefix' );

// 8.2 Leading/trailing slashes stripped
$t->assertEqual( 'media/files', $s->sanitize_path_prefix( '/media/files/' ), '8.2 Slashes stripped' );

// 8.3 Empty prefix allowed
$t->assertEqual( '', $s->sanitize_path_prefix( '' ), '8.3 Empty prefix allowed' );

// 8.4 Path traversal: prefix is trimmed of slashes but dots pass through
// (admin-only field, used with known base paths)
$result = $s->sanitize_path_prefix( '../etc/passwd' );
$t->assertEqual( '../etc/passwd', $result, '8.4 Path prefix: admin-controlled, dots preserved' );

// =============================================================================

exit( $t->summary() );

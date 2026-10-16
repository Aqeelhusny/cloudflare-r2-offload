<?php
/**
 * QA helper, run inside WordPress:  wp eval-file /tmp/qa-h.php <cmd> [json-arg]
 * Prints one JSON object. Read-only except the explicit set/legacy commands.
 */
$cmd = $args[0] ?? '';
$arg = isset( $args[1] ) ? json_decode( $args[1], true ) : null;
$p   = R2Offload\Plugin::get_instance();
$out = [];

/** Independent existence check: raw S3 HeadObject. Does NOT use the plugin's R2Client::check_key(). */
function qa_head( string $key ): string {
    static $c = null;
    $st = R2Offload\Plugin::get_instance()->settings;
    if ( ! $st->get_bucket() || ! $st->get_account_id() ) {
        return 'unconfigured';
    }
    $c  = $c ?:new R2Offload\Vendor\Aws\S3\S3Client( [
        'version' => 'latest', 'region' => 'auto', 'use_path_style_endpoint' => true,
        'endpoint' => 'https://' . $st->get_account_id() . '.r2.cloudflarestorage.com',
        'credentials' => [ 'key' => $st->get_access_key_id(), 'secret' => $st->get_secret_access_key() ],
    ] );
    try { $c->headObject( [ 'Bucket' => $st->get_bucket(), 'Key' => $key ] ); return 'found'; }
    catch ( R2Offload\Vendor\Aws\Exception\AwsException $e ) { return $e->getStatusCode() === 404 ? 'missing' : 'error:' . $e->getStatusCode(); }
}

/** Expected [relative path] list for an attachment, derived independently of the plugin. */
function qa_expected_files( int $id ): array {
    $attached = get_post_meta( $id, '_wp_attached_file', true );
    $meta     = wp_get_attachment_metadata( $id ) ?: [];
    $dir      = dirname( $attached ) === '.' ? '' : dirname( $attached ) . '/';
    $files    = [ $attached ];
    if ( ! empty( $meta['original_image'] ) ) {
        $files[] = $dir . $meta['original_image'];
    }
    foreach ( $meta['sizes'] ?? [] as $s ) {
        if ( ! empty( $s['file'] ) ) {
            $files[] = $dir . $s['file'];
        }
    }
    foreach ( [ 'source_image', 'animated_video', 'animated_video_poster' ] as $extra ) {
        if ( ! empty( $meta[ $extra ] ) && is_string( $meta[ $extra ] ) ) {
            $files[] = $dir . $meta[ $extra ];
        }
    }
    return array_values( array_unique( $files ) );
}

switch ( $cmd ) {
    case 'state':
        $id     = (int) $arg;
        $base   = trailingslashit( wp_upload_dir()['basedir'] );
        $prefix = $p->settings->get_path_prefix();
        $keys   = json_decode( (string) get_post_meta( $id, '_r2_offload_keys', true ), true ) ?: [];
        $files  = [];
        foreach ( qa_expected_files( $id ) as $rel ) {
            $key            = $prefix ? "{$prefix}/{$rel}" : $rel;
            $files[ $rel ]  = [
                'local'   => file_exists( $base . $rel ),
                'r2'      => qa_head( $key ),
                'tracked' => in_array( $key, $keys, true ),
            ];
        }
        $out = [
            'exists'        => (bool) get_post( $id ),
            'synced'        => get_post_meta( $id, '_r2_offload_synced', true ),
            'local_deleted' => get_post_meta( $id, '_r2_offload_local_deleted', true ),
            'error'         => get_post_meta( $id, '_r2_offload_error', true ),
            'retry'         => get_post_meta( $id, '_r2_offload_retry_count', true ),
            'nkeys'         => count( $keys ),
            'keys'          => $keys,
            'meta_sizes'    => array_keys( ( wp_get_attachment_metadata( $id ) ?: [] )['sizes'] ?? [] ),
            'original'      => ( wp_get_attachment_metadata( $id ) ?: [] )['original_image'] ?? null,
            'files'         => $files,
        ];
        break;

    case 'r2keys': // Check arbitrary keys on R2.
        foreach ( (array) $arg as $k ) {
            $out[ $k ] = qa_head( $k );
        }
        break;

    case 'urls':
        $id  = (int) $arg;
        $out = [
            'url'     => wp_get_attachment_url( $id ),
            'src'     => wp_get_attachment_image_src( $id, 'medium' )[0] ?? null,
            'srcset'  => wp_get_attachment_image_srcset( $id, 'large' ),
            'img'     => wp_get_attachment_image( $id, 'large' ),
            'content' => apply_filters( 'the_content', '<img src="' . wp_get_attachment_image_src( $id, 'thumbnail' )[0] . '">' ),
            'orig'    => wp_get_original_image_url( $id ),
        ];
        break;

    case 'set': // {option: value}
        foreach ( (array) $arg as $k => $v ) {
            update_option( $k, $v );
        }
        $out = [ 'ok' => true ];
        break;

    case 'legacy': // Make a synced attachment look like 1.4.0 synced it (no original_image on R2).
        $id     = (int) $arg;
        $meta   = wp_get_attachment_metadata( $id );
        $dir    = dirname( get_post_meta( $id, '_wp_attached_file', true ) );
        $okey   = $p->settings->get_path_prefix() . "/{$dir}/{$meta['original_image']}";
        $keys   = array_values( array_diff( json_decode( (string) get_post_meta( $id, "_r2_offload_keys", true ), true ) ?: [], [ $okey ] ) );
        update_post_meta( $id, '_r2_offload_keys', wp_json_encode( $keys ) );
        $out    = [ 'removed_from_keys' => $okey, 'r2_delete' => $p->r2->delete_files( [ $okey ] ) ];
        break;

    case 'queue':
        global $wpdb;
        $out = [
            'migration' => $wpdb->get_results( "SELECT attachment_id, status, retry_count FROM {$wpdb->prefix}r2_offload_migration_queue", ARRAY_A ),
            'tables'    => $wpdb->get_col( "SHOW TABLES LIKE '{$wpdb->prefix}r2_offload_%'" ),
        ];
        break;

    case 'cron':
        $hooks = [];
        foreach ( _get_cron_array() ?: [] as $ts => $events ) {
            foreach ( $events as $h => $e ) {
                if ( strpos( $h, 'r2_offload' ) === 0 ) {
                    $hooks[] = $h;
                }
            }
        }
        $out = [ 'hooks' => $hooks ];
        break;

    case 'secret':
        $raw = (string) get_option( 'r2_offload_secret_access_key' );
        $out = [
            'stored_prefix'   => substr( $raw, 0, 6 ),
            'stored_has_raw'  => $arg && strpos( $raw, $arg ) !== false,
            'decrypts_ok'     => $p->settings->get_secret_access_key() === $arg,
        ];
        break;

    case 'hpos':
        $c   = wc_get_container()->get( Automattic\WooCommerce\Internal\Features\FeaturesController::class );
        $out = [
            'hpos_compatible'   => in_array( 'cloudflare-r2-offload/cloudflare-r2-offload.php', $c->get_compatible_plugins_for_feature( 'custom_order_tables', true )['compatible'] ?? [], true ),
            'blocks_compatible' => in_array( 'cloudflare-r2-offload/cloudflare-r2-offload.php', $c->get_compatible_plugins_for_feature( 'cart_checkout_blocks', true )['compatible'] ?? [], true ),
        ];
        break;

    case 'race': // Two independent workers claim from the REAL queue table; claims must be disjoint.
        global $wpdb;
        $t = $wpdb->prefix . 'r2_offload_migration_queue';
        $now = current_time( 'mysql', true );
        $wpdb->query( "DELETE FROM {$t} WHERE attachment_id >= 900000" );
        for ( $i = 1; $i <= 20; $i++ ) {
            $wpdb->insert( $t, [ 'attachment_id' => 900000 + $i, 'status' => 'pending', 'retry_count' => 0, 'created_at' => $now, 'updated_at' => $now ] );
        }
        $m = new ReflectionMethod( R2Offload\BatchProcessor::class, 'claim_batch' );
        $w1 = new R2Offload\BatchProcessor( $p->sync, $p->settings, $p->logger );
        $w2 = new R2Offload\BatchProcessor( $p->sync, $p->settings, $p->logger );
        $a  = array_map( fn( $r ) => (int) $r->attachment_id, $m->invoke( $w1, $t, null, 10 ) );
        $b  = array_map( fn( $r ) => (int) $r->attachment_id, $m->invoke( $w2, $t, null, 10 ) );
        $wpdb->query( "DELETE FROM {$t} WHERE attachment_id >= 900000" );
        $out = [ 'w1' => count( $a ), 'w2' => count( $b ), 'overlap' => count( array_intersect( $a, $b ) ) ];
        break;

    case 'cleanup_prefix':
        $out = [ 'deleted' => $p->r2->delete_by_prefix( (string) $arg ), 'left' => count( $p->r2->list_objects( (string) $arg, 10 )['objects'] ) ];
        break;
}

echo wp_json_encode( $out );

<?php
namespace R2Offload\Admin;

use R2Offload\Settings;
use R2Offload\R2Client;
use R2Offload\ErrorLogger;

defined( 'ABSPATH' ) || exit;

class FileManagerPage {

    private Settings    $settings;
    private R2Client    $r2;
    private ErrorLogger $logger;

    public function __construct( Settings $settings, R2Client $r2, ErrorLogger $logger ) {
        $this->settings = $settings;
        $this->r2       = $r2;
        $this->logger   = $logger;
    }

    public function register_hooks(): void {
        add_action( 'wp_ajax_r2_offload_fm_list',        [ $this, 'ajax_list' ] );
        add_action( 'wp_ajax_r2_offload_fm_delete_file', [ $this, 'ajax_delete_file' ] );
    }

    public function render(): void {
        // Verify nonce on filter/pagination submissions (not present on first load).
        if ( isset( $_GET['_wpnonce'] ) ) {
            check_admin_referer( 'r2_offload_fm_filter' );
        }

        $prefix     = isset( $_GET['prefix'] ) ? sanitize_text_field( wp_unslash( $_GET['prefix'] ) ) : '';
        $cdn_base   = untrailingslashit( $this->settings->get_cdn_base_url() );
        $path_prefix = $this->settings->get_path_prefix();
        $token      = isset( $_GET['token'] ) ? sanitize_text_field( wp_unslash( $_GET['token'] ) ) : '';

        $result  = $this->r2->list_objects( $prefix, 50, $token );
        $objects = $result['objects'] ?? [];
        $next    = $result['next_token'] ?? '';

        // Recent log entries (local).
        $log_entries = $this->logger->get_recent_entries( 20 );
        ?>
        <div class="wrap r2-offload-wrap">
            <h1><?php esc_html_e( 'R2 Offload — File Manager', 'cloudflare-r2-offload' ); ?></h1>

            <!-- Filter bar -->
            <form method="get" class="r2-fm-filter">
                <input type="hidden" name="page" value="r2-offload-file-manager" />
                <?php wp_nonce_field( 'r2_offload_fm_filter' ); ?>
                <input type="text" name="prefix" value="<?php echo esc_attr( $prefix ); ?>"
                       placeholder="<?php esc_attr_e( 'Filter by prefix…', 'cloudflare-r2-offload' ); ?>"
                       class="regular-text" />
                <button type="submit" class="button"><?php esc_html_e( 'Filter', 'cloudflare-r2-offload' ); ?></button>
                <?php if ( $prefix ) : ?>
                <a href="<?php echo esc_url( admin_url( 'admin.php?page=r2-offload-file-manager' ) ); ?>" class="button">
                    <?php esc_html_e( 'Clear', 'cloudflare-r2-offload' ); ?>
                </a>
                <?php endif; ?>
            </form>

            <!-- Object tree — grouped by base image -->
            <?php if ( empty( $objects ) ) : ?>
                <p><?php esc_html_e( 'No objects found.', 'cloudflare-r2-offload' ); ?></p>
            <?php else : ?>
            <?php
                // --------------------------------------------------------
                // Group objects by base image name.
                //
                // WordPress generates thumbnails as:  name-300x300.jpg
                // The original is:                     name.jpg
                //
                // We strip the -WxH suffix to find the base name, then
                // group originals + thumbnails under one image card.
                // --------------------------------------------------------
                $image_groups = [];

                foreach ( $objects as $obj ) {
                    $key = $obj['Key'] ?? '';
                    if ( ! $key ) continue;

                    $filename = basename( $key );
                    $dir      = dirname( $key );

                    // Strip -WxH suffix to derive base image name.
                    $base_name = preg_replace( '/-\d+x\d+(?=\.\w+$)/', '', $filename );
                    $group_key = ( $dir !== '.' ? $dir . '/' : '' ) . $base_name;

                    if ( ! isset( $image_groups[ $group_key ] ) ) {
                        $image_groups[ $group_key ] = [
                            'dir'       => $dir !== '.' ? $dir : '',
                            'base_name' => $base_name,
                            'original'  => null,
                            'sizes'     => [],
                        ];
                    }

                    $is_thumb = (bool) preg_match( '/-\d+x\d+\.\w+$/', $filename );
                    if ( $is_thumb ) {
                        // Extract the dimension label.
                        preg_match( '/-(\d+x\d+)\.\w+$/', $filename, $m );
                        $obj['_dimension'] = $m[1] ?? '';
                        $image_groups[ $group_key ]['sizes'][] = $obj;
                    } else {
                        $image_groups[ $group_key ]['original'] = $obj;
                    }
                }

                ksort( $image_groups );

                // Summary stats.
                $total_images = count( $image_groups );
                $total_files  = count( $objects );
                $total_size   = 0;
                foreach ( $objects as $o ) { $total_size += (int) ( $o['Size'] ?? 0 ); }
            ?>

            <div class="r2-fm-toolbar">
                <button type="button" id="r2-fm-expand-all" class="button button-small">
                    <?php esc_html_e( 'Expand All', 'cloudflare-r2-offload' ); ?>
                </button>
                <button type="button" id="r2-fm-collapse-all" class="button button-small">
                    <?php esc_html_e( 'Collapse All', 'cloudflare-r2-offload' ); ?>
                </button>
                <span class="r2-fm-folder-meta" style="align-self:center;">
                    <?php
                    printf(
                        esc_html__( '%1$d images, %2$d files, %3$s total', 'cloudflare-r2-offload' ),
                        $total_images,
                        $total_files,
                        esc_html( $this->format_bytes( $total_size ) )
                    );
                    ?>
                </span>
            </div>

            <div class="r2-fm-tree">
                <?php foreach ( $image_groups as $group_key => $group ) :
                    $all_in_group = [];
                    if ( $group['original'] ) $all_in_group[] = $group['original'];
                    $all_in_group = array_merge( $all_in_group, $group['sizes'] );

                    $group_file_count = count( $all_in_group );
                    $group_size       = 0;
                    foreach ( $all_in_group as $o ) { $group_size += (int) ( $o['Size'] ?? 0 ); }

                    $card_id = 'r2-img-' . md5( $group_key );

                    // Original info for the card header.
                    $orig         = $group['original'];
                    $orig_key     = $orig ? ( $orig['Key'] ?? '' ) : '';
                    $orig_size    = $orig && isset( $orig['Size'] ) ? $this->format_bytes( (int) $orig['Size'] ) : '—';
                    $orig_modified = '';
                    if ( $orig && isset( $orig['LastModified'] ) ) {
                        $orig_modified = $orig['LastModified'] instanceof \DateTimeInterface
                            ? $orig['LastModified']->format( 'Y-m-d H:i' )
                            : (string) $orig['LastModified'];
                    }

                    $orig_url = '';
                    if ( $cdn_base && $orig_key ) {
                        $relative = $path_prefix ? ltrim( substr( $orig_key, strlen( $path_prefix ) ), '/' ) : $orig_key;
                        $orig_url = $cdn_base . '/' . $relative;
                    }

                    $thumb_count = count( $group['sizes'] );
                ?>
                <div class="r2-fm-image-card">
                    <div class="r2-fm-image-header" data-target="<?php echo esc_attr( $card_id ); ?>">
                        <span class="r2-fm-folder-toggle dashicons dashicons-arrow-right-alt2"></span>
                        <span class="dashicons dashicons-format-image" style="color:#0073aa;margin-right:6px;"></span>
                        <div class="r2-fm-image-info">
                            <strong class="r2-fm-image-name"><?php echo esc_html( $group['base_name'] ); ?></strong>
                            <span class="r2-fm-image-path"><?php echo esc_html( $group['dir'] ); ?></span>
                        </div>
                        <span class="r2-fm-image-stats">
                            <?php echo esc_html( $orig_size ); ?>
                            <?php if ( $thumb_count > 0 ) : ?>
                                &middot; <?php printf( esc_html__( '%d sizes', 'cloudflare-r2-offload' ), $thumb_count ); ?>
                            <?php endif; ?>
                            &middot; <?php echo esc_html( $this->format_bytes( $group_size ) ); ?> <?php esc_html_e( 'total', 'cloudflare-r2-offload' ); ?>
                        </span>
                        <span class="r2-fm-image-actions-inline">
                            <?php if ( $orig_url ) : ?>
                            <button type="button" class="button button-small r2-fm-copy" data-url="<?php echo esc_url( $orig_url ); ?>"
                                    onclick="event.stopPropagation();">
                                <?php esc_html_e( 'Copy URL', 'cloudflare-r2-offload' ); ?>
                            </button>
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="r2-fm-image-body" id="<?php echo esc_attr( $card_id ); ?>" style="display:none;">
                        <?php if ( $orig ) : ?>
                        <div class="r2-fm-original-row">
                            <span class="dashicons dashicons-media-default" style="color:#1d2327;margin-right:4px;vertical-align:middle;"></span>
                            <strong><?php echo esc_html( basename( $orig_key ) ); ?></strong>
                            <span class="r2-fm-size-tag r2-fm-size-tag--original"><?php esc_html_e( 'ORIGINAL', 'cloudflare-r2-offload' ); ?></span>
                            <span class="r2-fm-detail"><?php echo esc_html( $orig_size ); ?></span>
                            <span class="r2-fm-detail"><?php echo esc_html( $orig_modified ); ?></span>
                            <span class="r2-fm-original-actions">
                                <button type="button" class="button button-small button-link-delete r2-fm-delete"
                                        data-key="<?php echo esc_attr( $orig_key ); ?>">
                                    <?php esc_html_e( 'Delete', 'cloudflare-r2-offload' ); ?>
                                </button>
                            </span>
                        </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $group['sizes'] ) ) : ?>
                        <table class="wp-list-table widefat fixed striped r2-fm-table r2-fm-sizes-table">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'Thumbnail', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:90px;"><?php esc_html_e( 'Dimensions', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:80px;"><?php esc_html_e( 'Size', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:130px;"><?php esc_html_e( 'Last Modified', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:140px;"><?php esc_html_e( 'Actions', 'cloudflare-r2-offload' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $group['sizes'] as $thumb ) :
                                    $t_key       = $thumb['Key'] ?? '';
                                    $t_filename  = basename( $t_key );
                                    $t_size      = isset( $thumb['Size'] ) ? $this->format_bytes( (int) $thumb['Size'] ) : '—';
                                    $t_dim       = $thumb['_dimension'] ?? '';
                                    $t_modified  = isset( $thumb['LastModified'] ) ? ( $thumb['LastModified'] instanceof \DateTimeInterface ? $thumb['LastModified']->format( 'Y-m-d H:i' ) : (string) $thumb['LastModified'] ) : '—';
                                    $t_url = '';
                                    if ( $cdn_base ) {
                                        $t_rel = $path_prefix ? ltrim( substr( $t_key, strlen( $path_prefix ) ), '/' ) : $t_key;
                                        $t_url = $cdn_base . '/' . $t_rel;
                                    }
                                ?>
                                <tr data-key="<?php echo esc_attr( $t_key ); ?>">
                                    <td title="<?php echo esc_attr( $t_key ); ?>">
                                        <span class="dashicons dashicons-format-image" style="font-size:14px;width:14px;height:14px;vertical-align:middle;margin-right:4px;color:#787c82;"></span>
                                        <?php echo esc_html( $t_filename ); ?>
                                    </td>
                                    <td><span class="r2-fm-dim-tag"><?php echo esc_html( $t_dim ); ?></span></td>
                                    <td><?php echo esc_html( $t_size ); ?></td>
                                    <td><?php echo esc_html( $t_modified ); ?></td>
                                    <td>
                                        <?php if ( $t_url ) : ?>
                                        <button type="button" class="button button-small r2-fm-copy"
                                                data-url="<?php echo esc_url( $t_url ); ?>">
                                            <?php esc_html_e( 'Copy', 'cloudflare-r2-offload' ); ?>
                                        </button>
                                        <?php endif; ?>
                                        <button type="button" class="button button-small button-link-delete r2-fm-delete"
                                                data-key="<?php echo esc_attr( $t_key ); ?>">
                                            <?php esc_html_e( 'Delete', 'cloudflare-r2-offload' ); ?>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="r2-fm-pagination">
                <?php if ( $next ) : ?>
                <a href="<?php echo esc_url( wp_nonce_url( add_query_arg( [ 'page' => 'r2-offload-file-manager', 'prefix' => $prefix, 'token' => $next ], admin_url( 'admin.php' ) ), 'r2_offload_fm_filter' ) ); ?>"
                   class="button">
                    <?php esc_html_e( 'Next Page →', 'cloudflare-r2-offload' ); ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Logs section -->
            <div class="r2-logs-section">
                <h2>
                    <?php esc_html_e( 'Activity Logs', 'cloudflare-r2-offload' ); ?>
                    <button type="button" id="r2-btn-delete-logs" class="button button-small button-link-delete" style="margin-left:12px;">
                        <?php esc_html_e( 'Delete Logs', 'cloudflare-r2-offload' ); ?>
                    </button>
                    <span id="r2-delete-logs-result" class="r2-inline-result"></span>
                </h2>

                <?php if ( empty( $log_entries ) ) : ?>
                    <p><?php esc_html_e( 'No log entries found.', 'cloudflare-r2-offload' ); ?></p>
                <?php else : ?>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th style="width:160px;"><?php esc_html_e( 'Time', 'cloudflare-r2-offload' ); ?></th>
                            <th style="width:70px;"><?php esc_html_e( 'Level', 'cloudflare-r2-offload' ); ?></th>
                            <th><?php esc_html_e( 'Message', 'cloudflare-r2-offload' ); ?></th>
                            <th><?php esc_html_e( 'Context', 'cloudflare-r2-offload' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $log_entries as $entry ) : ?>
                        <tr class="r2-log-<?php echo esc_attr( $entry['level'] ?? 'info' ); ?>">
                            <td><?php echo esc_html( $entry['timestamp'] ?? '' ); ?></td>
                            <td><span class="r2-log-level"><?php echo esc_html( strtoupper( $entry['level'] ?? '' ) ); ?></span></td>
                            <td><?php echo esc_html( $entry['message'] ?? '' ); ?></td>
                            <td><code><?php echo esc_html( wp_json_encode( $entry['context'] ?? [] ) ); ?></code></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    // -------------------------------------------------------------------------
    // AJAX
    // -------------------------------------------------------------------------

    public function ajax_delete_file(): void {
        check_ajax_referer( 'r2_offload_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( [ 'message' => __( 'Unauthorized.', 'cloudflare-r2-offload' ) ], 403 );
        }
        $key = isset( $_POST['key'] ) ? sanitize_text_field( wp_unslash( $_POST['key'] ) ) : '';
        if ( ! $key ) {
            wp_send_json_error( [ 'message' => __( 'No key provided.', 'cloudflare-r2-offload' ) ] );
        }
        $ok = $this->r2->delete_file( $key );
        if ( $ok ) {
            wp_send_json_success( [ 'message' => __( 'File deleted.', 'cloudflare-r2-offload' ) ] );
        } else {
            wp_send_json_error( [ 'message' => __( 'Failed to delete file.', 'cloudflare-r2-offload' ) ] );
        }
    }

    public function ajax_list(): void {
        check_ajax_referer( 'r2_offload_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( [], 403 );
        }
        $prefix = isset( $_POST['prefix'] ) ? sanitize_text_field( wp_unslash( $_POST['prefix'] ) ) : '';
        $token  = isset( $_POST['token'] )  ? sanitize_text_field( wp_unslash( $_POST['token'] ) )  : '';
        $result = $this->r2->list_objects( $prefix, 50, $token );
        wp_send_json_success( $result );
    }

    private function format_bytes( int $bytes ): string {
        if ( $bytes >= 1073741824 ) return round( $bytes / 1073741824, 2 ) . ' GB';
        if ( $bytes >= 1048576 )   return round( $bytes / 1048576, 2 ) . ' MB';
        if ( $bytes >= 1024 )      return round( $bytes / 1024, 2 ) . ' KB';
        return $bytes . ' B';
    }
}

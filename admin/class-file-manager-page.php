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

        // Register AJAX for file manager actions.
        add_action( 'wp_ajax_r2_offload_fm_list',        [ $this, 'ajax_list' ] );
        add_action( 'wp_ajax_r2_offload_fm_delete_file', [ $this, 'ajax_delete_file' ] );
    }

    public function render(): void {
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

            <!-- Object tree -->
            <?php if ( empty( $objects ) ) : ?>
                <p><?php esc_html_e( 'No objects found.', 'cloudflare-r2-offload' ); ?></p>
            <?php else : ?>
            <?php
                // Group objects into a folder tree.
                $tree = [];
                foreach ( $objects as $obj ) {
                    $key = $obj['Key'] ?? '';
                    if ( ! $key ) continue;
                    $dir = dirname( $key );
                    if ( $dir === '.' ) $dir = '/';
                    $tree[ $dir ][] = $obj;
                }
                ksort( $tree );
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
                    $total_folders = count( $tree );
                    $total_files   = count( $objects );
                    $total_size    = 0;
                    foreach ( $objects as $o ) { $total_size += (int) ( $o['Size'] ?? 0 ); }
                    printf(
                        esc_html__( '%1$d folders, %2$d files, %3$s total', 'cloudflare-r2-offload' ),
                        $total_folders,
                        $total_files,
                        esc_html( $this->format_bytes( $total_size ) )
                    );
                    ?>
                </span>
            </div>
            <div class="r2-fm-tree">
                <?php foreach ( $tree as $folder => $folder_objects ) :
                    $file_count  = count( $folder_objects );
                    $folder_size = 0;
                    foreach ( $folder_objects as $obj ) {
                        $folder_size += (int) ( $obj['Size'] ?? 0 );
                    }
                    $folder_id = 'r2-folder-' . md5( $folder );
                ?>
                <div class="r2-fm-folder">
                    <div class="r2-fm-folder-header" data-target="<?php echo esc_attr( $folder_id ); ?>">
                        <span class="r2-fm-folder-toggle dashicons dashicons-arrow-right-alt2"></span>
                        <span class="dashicons dashicons-category" style="color:#0073aa;margin-right:4px;"></span>
                        <strong class="r2-fm-folder-name"><?php echo esc_html( $folder ); ?></strong>
                        <span class="r2-fm-folder-meta">
                            <?php echo esc_html( $file_count ); ?> <?php echo esc_html( _n( 'file', 'files', $file_count, 'cloudflare-r2-offload' ) ); ?>
                            &middot; <?php echo esc_html( $this->format_bytes( $folder_size ) ); ?>
                        </span>
                    </div>
                    <div class="r2-fm-folder-body" id="<?php echo esc_attr( $folder_id ); ?>" style="display:none;">
                        <table class="wp-list-table widefat fixed striped r2-fm-table">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'File', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:80px;"><?php esc_html_e( 'Size', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:140px;"><?php esc_html_e( 'Last Modified', 'cloudflare-r2-offload' ); ?></th>
                                    <th style="width:160px;"><?php esc_html_e( 'Actions', 'cloudflare-r2-offload' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $folder_objects as $obj ) :
                                    $key      = $obj['Key'] ?? '';
                                    $filename = basename( $key );
                                    $size     = isset( $obj['Size'] ) ? $this->format_bytes( (int) $obj['Size'] ) : '—';
                                    $modified = isset( $obj['LastModified'] ) ? ( $obj['LastModified'] instanceof \DateTimeInterface ? $obj['LastModified']->format( 'Y-m-d H:i' ) : (string) $obj['LastModified'] ) : '—';
                                    $public_url = '';
                                    if ( $cdn_base ) {
                                        $relative   = $path_prefix ? ltrim( substr( $key, strlen( $path_prefix ) ), '/' ) : $key;
                                        $public_url = $cdn_base . '/' . $relative;
                                    }

                                    // Detect thumbnail vs original by size suffix pattern.
                                    $is_thumb = (bool) preg_match( '/-\d+x\d+\.\w+$/', $filename );
                                ?>
                                <tr data-key="<?php echo esc_attr( $key ); ?>">
                                    <td title="<?php echo esc_attr( $key ); ?>">
                                        <span class="dashicons <?php echo $is_thumb ? 'dashicons-format-image' : 'dashicons-media-default'; ?>"
                                              style="font-size:16px;width:16px;height:16px;vertical-align:middle;margin-right:4px;color:<?php echo $is_thumb ? '#787c82' : '#1d2327'; ?>;"></span>
                                        <?php echo esc_html( $filename ); ?>
                                        <?php if ( $is_thumb ) : ?>
                                            <span class="r2-fm-size-tag"><?php esc_html_e( 'thumb', 'cloudflare-r2-offload' ); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo esc_html( $size ); ?></td>
                                    <td><?php echo esc_html( $modified ); ?></td>
                                    <td>
                                        <?php if ( $public_url ) : ?>
                                        <button type="button" class="button button-small r2-fm-copy"
                                                data-url="<?php echo esc_url( $public_url ); ?>">
                                            <?php esc_html_e( 'Copy URL', 'cloudflare-r2-offload' ); ?>
                                        </button>
                                        <?php endif; ?>
                                        <button type="button" class="button button-small button-link-delete r2-fm-delete"
                                                data-key="<?php echo esc_attr( $key ); ?>">
                                            <?php esc_html_e( 'Delete', 'cloudflare-r2-offload' ); ?>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="r2-fm-pagination">
                <?php if ( $next ) : ?>
                <a href="<?php echo esc_url( add_query_arg( [ 'page' => 'r2-offload-file-manager', 'prefix' => $prefix, 'token' => $next ], admin_url( 'admin.php' ) ) ); ?>"
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

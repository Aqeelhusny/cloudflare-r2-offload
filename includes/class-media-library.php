<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Integrates with the WordPress Media Library list view.
 *
 * Adds:
 *  - A "R2 Status" column showing sync state and local-deleted flag.
 *  - A "Restore from R2" row action per attachment.
 *  - A "Restore from R2" bulk action.
 *  - A "Delete local file" row action for synced attachments.
 */
class MediaLibrary {

    private AttachmentSync $sync;
    private Settings       $settings;

    public function __construct( AttachmentSync $sync, Settings $settings ) {
        $this->sync     = $sync;
        $this->settings = $settings;
    }

    public function register_hooks(): void {
        // List-view columns.
        add_filter( 'manage_media_columns',          [ $this, 'add_column' ] );
        add_action( 'manage_media_custom_column',    [ $this, 'render_column' ], 10, 2 );

        // Row actions (list mode only — not grid mode).
        add_filter( 'media_row_actions', [ $this, 'add_row_actions' ], 10, 2 );

        // Bulk actions.
        add_filter( 'bulk_actions-upload',           [ $this, 'add_bulk_actions' ] );
        add_filter( 'handle_bulk_actions-upload',    [ $this, 'handle_bulk_actions' ], 10, 3 );

        // Admin notice after bulk action.
        add_action( 'admin_notices',                 [ $this, 'bulk_action_notice' ] );
    }

    // -------------------------------------------------------------------------
    // Column
    // -------------------------------------------------------------------------

    public function add_column( array $columns ): array {
        $columns['r2_offload_status'] = __( 'R2 Status', 'cloudflare-r2-offload' );
        return $columns;
    }

    public function render_column( string $column_name, int $attachment_id ): void {
        if ( $column_name !== 'r2_offload_status' ) {
            return;
        }

        $synced        = get_post_meta( $attachment_id, '_r2_offload_synced', true ) === '1';
        $local_deleted = get_post_meta( $attachment_id, '_r2_offload_local_deleted', true ) === '1';
        $synced_at     = get_post_meta( $attachment_id, '_r2_offload_synced_at', true );
        $error         = get_post_meta( $attachment_id, '_r2_offload_error', true );

        if ( ! $synced ) {
            if ( $error ) {
                echo '<span class="r2-badge r2-badge--error" title="' . esc_attr( $error ) . '">'
                     . esc_html__( 'Error', 'cloudflare-r2-offload' ) . '</span>';
            } else {
                echo '<span class="r2-badge r2-badge--none">' . esc_html__( 'Not synced', 'cloudflare-r2-offload' ) . '</span>';
            }
            return;
        }

        if ( $local_deleted ) {
            echo '<span class="r2-badge r2-badge--r2only">' . esc_html__( 'R2 only', 'cloudflare-r2-offload' ) . '</span>';
        } else {
            echo '<span class="r2-badge r2-badge--synced">' . esc_html__( 'Synced', 'cloudflare-r2-offload' ) . '</span>';
        }

        if ( $synced_at ) {
            echo '<br><small>' . esc_html( date_i18n( get_option( 'date_format' ), (int) $synced_at ) ) . '</small>';
        }
    }

    // -------------------------------------------------------------------------
    // Row actions
    // -------------------------------------------------------------------------

    public function add_row_actions( array $actions, \WP_Post $post ): array {
        if ( $post->post_type !== 'attachment' ) {
            return $actions;
        }

        $synced        = get_post_meta( $post->ID, '_r2_offload_synced', true ) === '1';
        $local_deleted = get_post_meta( $post->ID, '_r2_offload_local_deleted', true ) === '1';

        if ( ! $synced ) {
            return $actions;
        }

        $nonce = wp_create_nonce( 'r2_offload_nonce' );

        // Restore from R2 — shown when local file is deleted.
        if ( $local_deleted ) {
            $actions['r2_restore'] = sprintf(
                '<a href="#" class="r2-row-restore" data-id="%d" data-nonce="%s">%s</a>',
                esc_attr( $post->ID ),
                esc_attr( $nonce ),
                esc_html__( 'Restore from R2', 'cloudflare-r2-offload' )
            );
        } else {
            // Delete local — shown when file is still stored locally.
            $actions['r2_delete_local'] = sprintf(
                '<a href="#" class="r2-row-delete-local" data-id="%d" data-nonce="%s" style="color:#d63638;">%s</a>',
                esc_attr( $post->ID ),
                esc_attr( $nonce ),
                esc_html__( 'Delete local file', 'cloudflare-r2-offload' )
            );
        }

        return $actions;
    }

    // -------------------------------------------------------------------------
    // Bulk actions
    // -------------------------------------------------------------------------

    public function add_bulk_actions( array $actions ): array {
        $actions['r2_bulk_restore']       = __( 'R2: Restore to server', 'cloudflare-r2-offload' );
        $actions['r2_bulk_delete_local']  = __( 'R2: Delete local files', 'cloudflare-r2-offload' );
        return $actions;
    }

    public function handle_bulk_actions( string $redirect_url, string $action, array $post_ids ): string {
        if ( ! in_array( $action, [ 'r2_bulk_restore', 'r2_bulk_delete_local' ], true ) ) {
            return $redirect_url;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return $redirect_url;
        }

        $processed = 0;
        $failed    = 0;

        foreach ( $post_ids as $id ) {
            $id = (int) $id;

            if ( $action === 'r2_bulk_restore' ) {
                if ( get_post_meta( $id, '_r2_offload_synced', true ) !== '1' ) {
                    continue;
                }
                $result     = $this->sync->restore_from_r2( $id );
                $processed += $result['restored'];
                $failed    += $result['failed'];
            } elseif ( $action === 'r2_bulk_delete_local' ) {
                if ( get_post_meta( $id, '_r2_offload_synced', true ) !== '1' ) {
                    continue;
                }
                $result     = $this->sync->delete_local_for_attachment( $id );
                $processed += $result['deleted'];
            }
        }

        $redirect_url = add_query_arg( [
            'r2_bulk_action'    => urlencode( $action ),
            'r2_bulk_processed' => $processed,
            'r2_bulk_failed'    => $failed,
        ], $redirect_url );

        return $redirect_url;
    }

    public function bulk_action_notice(): void {
        $screen = get_current_screen();
        if ( ! $screen || $screen->id !== 'upload' ) {
            return;
        }

        $action    = isset( $_GET['r2_bulk_action'] ) ? sanitize_text_field( wp_unslash( $_GET['r2_bulk_action'] ) ) : '';
        $processed = isset( $_GET['r2_bulk_processed'] ) ? absint( $_GET['r2_bulk_processed'] ) : 0;
        $failed    = isset( $_GET['r2_bulk_failed'] ) ? absint( $_GET['r2_bulk_failed'] ) : 0;

        if ( ! $action ) {
            return;
        }

        if ( $action === 'r2_bulk_restore' ) {
            $msg = sprintf(
                /* translators: %d: file count */
                _n( '%d file restored from R2.', '%d files restored from R2.', $processed, 'cloudflare-r2-offload' ),
                $processed
            );
        } else {
            $msg = sprintf(
                /* translators: %d: file count */
                _n( '%d local file deleted.', '%d local files deleted.', $processed, 'cloudflare-r2-offload' ),
                $processed
            );
        }

        $type = $failed > 0 ? 'warning' : 'success';
        if ( $failed > 0 ) {
            $msg .= ' ' . sprintf(
                /* translators: %d: failure count */
                _n( '%d failure — check the R2 Offload logs.', '%d failures — check the R2 Offload logs.', $failed, 'cloudflare-r2-offload' ),
                $failed
            );
        }

        printf(
            '<div class="notice notice-%s is-dismissible"><p>%s</p></div>',
            esc_attr( $type ),
            esc_html( $msg )
        );
    }
}

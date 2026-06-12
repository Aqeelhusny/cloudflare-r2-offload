<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * WP-CLI commands for Cloudflare R2 Offload.
 *
 * Registered as `wp r2` from Plugin::boot() when WP_CLI is defined.
 */
class CLI {

	/**
	 * Show R2 sync and queue status.
	 *
	 * ## EXAMPLES
	 *
	 *     wp r2 status
	 *
	 * @when after_wp_load
	 */
	public function status( array $args = [], array $assoc_args = [] ): void {
		global $wpdb;

		$plugin = Plugin::get_instance();
		$table  = $wpdb->prefix . 'r2_offload_migration_queue';

		$all = (int) $wpdb->get_var(
			$wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' )
		);
		$synced = (int) $wpdb->get_var(
			$wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' )
		);

		\WP_CLI::log( 'Configured:  ' . ( $plugin->settings->is_configured() ? 'yes' : 'no' ) );
		\WP_CLI::log( "Attachments: {$all} total, {$synced} synced" );

		$counts = $wpdb->get_results(
			"SELECT status, COUNT(*) AS cnt FROM `{$table}` GROUP BY status",
			OBJECT_K
		);
		foreach ( [ 'pending', 'processing', 'complete', 'failed' ] as $status ) {
			$cnt = isset( $counts[ $status ] ) ? (int) $counts[ $status ]->cnt : 0;
			\WP_CLI::log( sprintf( 'Queue %-11s %d', $status . ':', $cnt ) );
		}

		if ( get_option( 'r2_offload_migration_paused' ) ) {
			\WP_CLI::warning( 'Migration is PAUSED — run `wp r2 migrate` or resume from the admin to continue.' );
		}
	}

	/**
	 * Sync one or more attachments to R2 immediately.
	 *
	 * ## OPTIONS
	 *
	 * <id>...
	 * : One or more attachment IDs.
	 *
	 * ## EXAMPLES
	 *
	 *     wp r2 sync 123
	 *     wp r2 sync 123 456 789
	 *
	 * @when after_wp_load
	 */
	public function sync( array $args, array $assoc_args = [] ): void {
		$plugin = Plugin::get_instance();
		if ( ! $plugin->settings->is_configured() ) {
			\WP_CLI::error( 'R2 credentials are not configured.' );
		}

		$failed_any = false;
		foreach ( $args as $raw_id ) {
			$id     = absint( $raw_id );
			$result = $plugin->sync->sync_attachment( $id );
			$line   = sprintf(
				'Attachment %d — uploaded: %d, skipped: %d, failed: %d, missing: %d',
				$id,
				$result['uploaded'],
				$result['skipped'],
				$result['failed'],
				$result['missing']
			);
			if ( $result['failed'] > 0 ) {
				$failed_any = true;
				\WP_CLI::warning( $line );
			} else {
				\WP_CLI::log( $line );
			}
		}

		if ( $failed_any ) {
			\WP_CLI::error( 'One or more attachments failed to sync — check the R2 Offload logs.' );
		}
		\WP_CLI::success( 'Done.' );
	}

	/**
	 * Migrate the entire media library to R2.
	 *
	 * Enqueues every unsynced attachment, then drains the queue in this
	 * process — no WP-Cron dependency, no PHP time limits. Resumable:
	 * re-running continues where the last run stopped. Rows are claimed
	 * atomically, so several instances can run in parallel terminals for
	 * more throughput without colliding (and without fighting the cron
	 * runner if it fires too).
	 *
	 * ## OPTIONS
	 *
	 * [--enqueue-only]
	 * : Fill the queue and kick WP-Cron instead of processing here.
	 *
	 * ## EXAMPLES
	 *
	 *     wp r2 migrate
	 *     wp r2 migrate --enqueue-only
	 *
	 * @when after_wp_load
	 */
	public function migrate( array $args = [], array $assoc_args = [] ): void {
		global $wpdb;

		$plugin = Plugin::get_instance();
		if ( ! $plugin->settings->is_configured() ) {
			\WP_CLI::error( 'R2 credentials are not configured.' );
		}

		$table = $wpdb->prefix . 'r2_offload_migration_queue';
		$now   = current_time( 'mysql', true );

		// INSERT IGNORE keeps existing rows (UNIQUE on attachment_id) — a
		// re-run resumes the queue instead of restarting it.
		$wpdb->query(
			$wpdb->prepare(
				"INSERT IGNORE INTO `{$table}` (attachment_id, status, created_at, updated_at)
				 SELECT p.ID, 'pending', %s, %s
				 FROM {$wpdb->posts} p
				 LEFT JOIN {$wpdb->postmeta} pm
				       ON pm.post_id = p.ID
				      AND pm.meta_key = %s
				      AND pm.meta_value = %s
				 WHERE p.post_type = %s
				   AND pm.meta_id IS NULL
				 ORDER BY p.ID ASC",
				$now, $now, '_r2_offload_synced', '1', 'attachment'
			)
		);
		delete_option( 'r2_offload_migration_paused' );

		$pending = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}` WHERE status = 'pending'" );
		if ( $pending === 0 ) {
			\WP_CLI::success( 'Nothing to migrate — all attachments are synced.' );
			return;
		}

		if ( isset( $assoc_args['enqueue-only'] ) ) {
			BatchProcessor::kick( BatchProcessor::CRON_HOOK );
			\WP_CLI::success( "{$pending} attachments queued for background processing." );
			return;
		}

		\WP_CLI::log( "Migrating {$pending} attachments to R2…" );
		$progress = \WP_CLI\Utils\make_progress_bar( 'Syncing', $pending );

		$stats = $plugin->batch_processor->drain_migration_queue(
			function () use ( $progress ) {
				$progress->tick();
			}
		);

		$progress->finish();

		$summary = "Migration finished — successful: {$stats['complete']}, failed attempts: {$stats['failed']}.";

		if ( $stats['failed_rows'] > 0 ) {
			\WP_CLI::warning( $summary . " {$stats['failed_rows']} attachment(s) exhausted their retries — fix the cause, then `wp r2 retry`." );
			return;
		}
		\WP_CLI::success( $summary );
	}

	/**
	 * Reset failed migration-queue rows to pending and process them.
	 *
	 * ## EXAMPLES
	 *
	 *     wp r2 retry
	 *
	 * @when after_wp_load
	 */
	public function retry( array $args = [], array $assoc_args = [] ): void {
		global $wpdb;

		$table = $wpdb->prefix . 'r2_offload_migration_queue';
		$reset = (int) $wpdb->query(
			$wpdb->prepare(
				"UPDATE `{$table}` SET status = 'pending', retry_count = 0, claimed_by = NULL, error_message = NULL, updated_at = %s WHERE status = 'failed'",
				current_time( 'mysql', true )
			)
		);

		if ( $reset === 0 ) {
			\WP_CLI::success( 'No failed rows to retry.' );
			return;
		}

		\WP_CLI::log( "{$reset} failed row(s) reset — processing…" );
		$this->migrate();
	}
}

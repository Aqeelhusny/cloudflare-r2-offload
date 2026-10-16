<?php
namespace R2Offload\Admin;

use R2Offload\Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Settings screen: status cards, four tabs, one options.php form with a sticky save bar.
 *
 * Every field keeps its registered option name, so the register_setting() sanitizers
 * (secret encryption, account-ID validation, MB → bytes) handle saving exactly as before.
 * The upload "mode" radio is UI only — settings.js mirrors it into the two real options.
 */
class SettingsPage {

    private Settings $settings;

    public function __construct( Settings $settings ) {
        $this->settings = $settings;
    }

    public function render(): void {
        global $wpdb;

        $s          = $this->settings;
        $configured = $s->is_configured();
        $domain     = $s->get_custom_domain();
        $serving    = $s->get_serve_from_r2() && $domain !== '';
        $has_secret = get_option( 'r2_offload_secret_access_key', '' ) !== '';
        $on_save    = (bool) get_option( 'r2_offload_upload_on_save', 1 );
        $background = (bool) get_option( 'r2_offload_background_offload', 0 );
        $mode       = ! $on_save ? 'off' : ( $background ? 'queue' : 'now' );
        $excluded   = get_option( 'r2_offload_excluded_mime_types', [] );
        $excluded   = is_array( $excluded ) ? $excluded : [];

        $total  = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' ) );
        $synced = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' ) );

        $modes = [
            'now'   => [ __( 'Upload to R2 immediately', 'cloudflare-r2-offload' ), __( 'Best for normal day-to-day uploads.', 'cloudflare-r2-offload' ) ],
            'queue' => [ __( 'Queue and upload in the background', 'cloudflare-r2-offload' ), __( 'Keeps uploads fast for bulk imports (100+ images, REST/API). Processed by WP-Cron within seconds.', 'cloudflare-r2-offload' ) ],
            'off'   => [ __( 'Keep on this server only', 'cloudflare-r2-offload' ), __( 'Nothing is sent to R2 automatically. Use the Migration page to offload later.', 'cloudflare-r2-offload' ) ],
        ];
        ?>
        <div class="wrap r2ui">
            <div class="r2ui-head">
                <h1><?php esc_html_e( 'Cloudflare R2 Offload', 'cloudflare-r2-offload' ); ?></h1>
            </div>

            <?php settings_errors(); ?>

            <div class="r2ui-cards" aria-label="<?php esc_attr_e( 'Status', 'cloudflare-r2-offload' ); ?>">
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Connection', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-state" id="r2ui-conn-state">
                        <span class="r2ui-dot <?php echo $configured ? 'is-ok' : 'is-warn'; ?>" aria-hidden="true"></span>
                        <span><?php echo $configured ? esc_html__( 'Credentials saved', 'cloudflare-r2-offload' ) : esc_html__( 'Not set up', 'cloudflare-r2-offload' ); ?></span>
                    </span>
                    <span class="r2ui-sub" id="r2ui-conn-sub">
                        <?php
                        echo $configured
                            /* translators: %s: bucket name */
                            ? esc_html( sprintf( __( 'Bucket %s · not tested this session', 'cloudflare-r2-offload' ), $s->get_bucket() ) )
                            : esc_html__( 'Add your R2 credentials below', 'cloudflare-r2-offload' );
                        ?>
                    </span>
                </div>
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Media library', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-state">
                        <?php
                        /* translators: 1: synced count, 2: total count */
                        echo esc_html( sprintf( __( '%1$s of %2$s on R2', 'cloudflare-r2-offload' ), number_format_i18n( $synced ), number_format_i18n( $total ) ) );
                        ?>
                    </span>
                    <a class="r2ui-sub" href="<?php echo esc_url( admin_url( 'admin.php?page=r2-offload-migration' ) ); ?>"><?php esc_html_e( 'Open migration →', 'cloudflare-r2-offload' ); ?></a>
                </div>
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Serving', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-state">
                        <span class="r2ui-dot <?php echo $serving ? 'is-ok' : 'is-warn'; ?>" aria-hidden="true"></span>
                        <span><?php echo $serving ? esc_html__( 'From R2 CDN', 'cloudflare-r2-offload' ) : esc_html__( 'From this server', 'cloudflare-r2-offload' ); ?></span>
                    </span>
                    <span class="r2ui-sub">
                        <?php
                        if ( $serving ) {
                            echo esc_html( $domain );
                        } elseif ( $domain !== '' ) {
                            esc_html_e( 'Serving is turned off', 'cloudflare-r2-offload' );
                        } else {
                            esc_html_e( 'Add a public domain to enable', 'cloudflare-r2-offload' );
                        }
                        ?>
                    </span>
                </div>
            </div>

            <form method="post" action="options.php" id="r2ui-form" novalidate>
                <?php settings_fields( Settings::OPTION_GROUP ); ?>

                <div class="r2ui-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Settings sections', 'cloudflare-r2-offload' ); ?>">
                    <?php
                    $tabs = [
                        'connection' => __( 'Connection', 'cloudflare-r2-offload' ),
                        'delivery'   => __( 'Delivery', 'cloudflare-r2-offload' ),
                        'uploads'    => __( 'Uploads', 'cloudflare-r2-offload' ),
                        'advanced'   => __( 'Advanced', 'cloudflare-r2-offload' ),
                    ];
                    $first = true;
                    foreach ( $tabs as $id => $label ) :
                        ?>
                        <button type="button" role="tab" class="r2ui-tab" id="r2ui-tab-<?php echo esc_attr( $id ); ?>"
                                aria-controls="r2ui-panel-<?php echo esc_attr( $id ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>"
                                tabindex="<?php echo $first ? '0' : '-1'; ?>" data-tab="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></button>
                        <?php
                        $first = false;
                    endforeach;
                    ?>
                </div>

                <!-- ============================ Connection ============================ -->
                <section class="r2ui-panel" role="tabpanel" id="r2ui-panel-connection" aria-labelledby="r2ui-tab-connection">
                    <div class="r2ui-intro">
                        <h2><?php esc_html_e( 'Cloudflare R2 credentials', 'cloudflare-r2-offload' ); ?></h2>
                        <p><?php echo wp_kses( __( 'Create an API token with <b>Object Read &amp; Write</b> scoped to one bucket in Cloudflare → R2 → Manage API tokens.', 'cloudflare-r2-offload' ), [ 'b' => [] ] ); ?></p>
                    </div>
                    <div class="r2ui-grid r2ui-grid--2">
                        <label class="r2ui-field" data-conn-field><?php esc_html_e( 'Account ID', 'cloudflare-r2-offload' ); ?>
                            <input type="text" name="r2_offload_account_id" value="<?php echo esc_attr( $s->get_account_id() ); ?>" autocomplete="off" spellcheck="false" pattern="[a-fA-F0-9]+">
                            <span class="r2ui-help"><?php esc_html_e( '32 hex characters, from the R2 overview page.', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                        <label class="r2ui-field" data-conn-field><?php esc_html_e( 'Bucket', 'cloudflare-r2-offload' ); ?>
                            <input type="text" name="r2_offload_bucket" value="<?php echo esc_attr( $s->get_bucket() ); ?>" spellcheck="false">
                            <span class="r2ui-help"><?php esc_html_e( 'Lowercase letters, digits and hyphens.', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                        <label class="r2ui-field" data-conn-field><?php esc_html_e( 'Access Key ID', 'cloudflare-r2-offload' ); ?>
                            <input type="text" name="r2_offload_access_key_id" value="<?php echo esc_attr( $s->get_access_key_id() ); ?>" autocomplete="off" spellcheck="false">
                        </label>
                        <div class="r2ui-field" data-conn-field>
                            <span id="r2ui-secret-label"><?php esc_html_e( 'Secret Access Key', 'cloudflare-r2-offload' ); ?></span>
                            <?php if ( $has_secret ) : ?>
                                <div class="r2ui-secret" id="r2ui-secret-saved">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="4" y="11" width="16" height="10" rx="2"></rect><path d="M8 11V7a4 4 0 0 1 8 0v4"></path></svg>
                                    <span><?php esc_html_e( 'Saved and encrypted', 'cloudflare-r2-offload' ); ?></span>
                                    <button type="button" class="r2ui-link" id="r2ui-secret-replace"><?php esc_html_e( 'Replace', 'cloudflare-r2-offload' ); ?></button>
                                </div>
                                <input type="hidden" name="r2_offload_secret_access_key" value="__R2_SECRET_UNCHANGED__" id="r2ui-secret-keep">
                                <input type="password" name="r2_offload_secret_access_key" id="r2ui-secret-input" aria-labelledby="r2ui-secret-label" autocomplete="new-password" placeholder="<?php esc_attr_e( 'Paste the new secret', 'cloudflare-r2-offload' ); ?>" disabled hidden>
                            <?php else : ?>
                                <input type="password" name="r2_offload_secret_access_key" aria-labelledby="r2ui-secret-label" autocomplete="new-password">
                            <?php endif; ?>
                            <span class="r2ui-help"><?php esc_html_e( 'Stored encrypted (AES-256). Never shown again after saving.', 'cloudflare-r2-offload' ); ?></span>
                        </div>
                    </div>
                    <div class="r2ui-actions">
                        <button type="button" class="button r2ui-btn" id="r2-test-connection"><?php esc_html_e( 'Test connection', 'cloudflare-r2-offload' ); ?></button>
                        <span id="r2-connection-result" class="r2ui-result" role="status"></span>
                    </div>
                </section>

                <!-- ============================ Delivery ============================ -->
                <section class="r2ui-panel" role="tabpanel" id="r2ui-panel-delivery" aria-labelledby="r2ui-tab-delivery" hidden>
                    <div class="r2ui-field">
                        <span id="r2ui-domain-label"><?php esc_html_e( 'Public domain', 'cloudflare-r2-offload' ); ?></span>
                        <div class="r2ui-joined">
                            <select name="r2_offload_url_scheme" aria-label="<?php esc_attr_e( 'URL scheme', 'cloudflare-r2-offload' ); ?>" id="r2ui-scheme">
                                <option value="https" <?php selected( $s->get_url_scheme(), 'https' ); ?>>https://</option>
                                <option value="http" <?php selected( $s->get_url_scheme(), 'http' ); ?>>http://</option>
                            </select>
                            <input type="text" name="r2_offload_custom_domain" id="r2ui-domain" aria-labelledby="r2ui-domain-label" value="<?php echo esc_attr( $domain ); ?>" placeholder="cdn.example.com" spellcheck="false">
                        </div>
                        <span class="r2ui-help"><?php esc_html_e( 'The custom domain connected to this bucket in Cloudflare. Required to serve media from R2.', 'cloudflare-r2-offload' ); ?></span>
                    </div>
                    <label class="r2ui-field"><?php esc_html_e( 'Path prefix', 'cloudflare-r2-offload' ); ?>
                        <input type="text" name="r2_offload_path_prefix" id="r2ui-prefix" value="<?php echo esc_attr( $s->get_path_prefix() ); ?>" spellcheck="false">
                        <span class="r2ui-help r2ui-help--danger"><?php esc_html_e( 'Changing this after media is synced breaks existing R2 links. Re-run migration if you change it.', 'cloudflare-r2-offload' ); ?></span>
                    </label>
                    <div class="r2ui-preview">
                        <span class="r2ui-eyebrow"><?php esc_html_e( 'Preview — a media URL will look like', 'cloudflare-r2-offload' ); ?></span>
                        <code id="r2ui-preview-url"></code>
                    </div>
                    <div class="r2ui-row">
                        <div>
                            <span class="r2ui-row-title"><?php esc_html_e( 'Serve media from R2', 'cloudflare-r2-offload' ); ?></span>
                            <span class="r2ui-help" id="r2ui-serve-help"></span>
                        </div>
                        <label class="r2ui-switch">
                            <input type="checkbox" role="switch" name="r2_offload_serve_from_r2" value="1" id="r2ui-serve" <?php checked( $s->get_serve_from_r2() ); ?>>
                            <span class="screen-reader-text"><?php esc_html_e( 'Serve media from R2', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                    </div>
                </section>

                <!-- ============================ Uploads ============================ -->
                <section class="r2ui-panel" role="tabpanel" id="r2ui-panel-uploads" aria-labelledby="r2ui-tab-uploads" hidden>
                    <fieldset class="r2ui-choices">
                        <legend><?php esc_html_e( 'When new media is uploaded', 'cloudflare-r2-offload' ); ?></legend>
                        <?php foreach ( $modes as $id => [ $label, $help ] ) : ?>
                            <label class="r2ui-choice">
                                <input type="radio" name="r2ui_upload_mode" value="<?php echo esc_attr( $id ); ?>" <?php checked( $mode, $id ); ?>>
                                <span><b><?php echo esc_html( $label ); ?></b><span class="r2ui-help"><?php echo esc_html( $help ); ?></span></span>
                            </label>
                        <?php endforeach; ?>
                    </fieldset>
                    <input type="hidden" name="r2_offload_upload_on_save" id="r2ui-on-save" value="<?php echo $on_save ? '1' : '0'; ?>">
                    <input type="hidden" name="r2_offload_background_offload" id="r2ui-background" value="<?php echo $background ? '1' : '0'; ?>">

                    <div class="r2ui-danger" id="r2ui-delete-box">
                        <div class="r2ui-row">
                            <div>
                                <span class="r2ui-row-title"><?php esc_html_e( 'Delete local copies after upload', 'cloudflare-r2-offload' ); ?></span>
                                <span class="r2ui-help"><?php esc_html_e( 'Frees server disk. Files are removed only once every size is confirmed on R2, and can be restored from the Migration page.', 'cloudflare-r2-offload' ); ?></span>
                            </div>
                            <label class="r2ui-switch">
                                <input type="checkbox" role="switch" name="r2_offload_delete_local" value="1" id="r2ui-delete" <?php checked( $s->get_delete_local() ); ?>>
                                <span class="screen-reader-text"><?php esc_html_e( 'Delete local copies after upload', 'cloudflare-r2-offload' ); ?></span>
                            </label>
                        </div>
                        <p class="r2ui-danger-note"><?php esc_html_e( "R2 becomes the only copy of new media. Keep your bucket's backups or versioning on.", 'cloudflare-r2-offload' ); ?></p>
                    </div>
                </section>

                <!-- ============================ Advanced ============================ -->
                <section class="r2ui-panel" role="tabpanel" id="r2ui-panel-advanced" aria-labelledby="r2ui-tab-advanced" hidden>
                    <p class="r2ui-muted"><?php esc_html_e( 'Defaults suit most sites. Change these only for very large libraries or constrained hosting.', 'cloudflare-r2-offload' ); ?></p>
                    <div class="r2ui-grid r2ui-grid--3">
                        <label class="r2ui-field"><?php esc_html_e( 'Batch size', 'cloudflare-r2-offload' ); ?>
                            <input type="number" name="r2_offload_batch_size" value="<?php echo esc_attr( $s->get_batch_size() ); ?>" min="1" max="50">
                            <span class="r2ui-help"><?php esc_html_e( 'Items per background run (1–50).', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                        <label class="r2ui-field"><?php esc_html_e( 'Multipart above (MB)', 'cloudflare-r2-offload' ); ?>
                            <input type="number" name="r2_offload_multipart_threshold" value="<?php echo esc_attr( (int) ( $s->get_multipart_threshold() / 1048576 ) ); ?>" min="5">
                            <span class="r2ui-help"><?php esc_html_e( 'Minimum 5 MB.', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                        <label class="r2ui-field"><?php esc_html_e( 'Parallel parts', 'cloudflare-r2-offload' ); ?>
                            <input type="number" name="r2_offload_multipart_concurrency" value="<?php echo esc_attr( $s->get_multipart_concurrency() ); ?>" min="1" max="10">
                            <span class="r2ui-help"><?php esc_html_e( '1–10.', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                    </div>
                    <div class="r2ui-field">
                        <span id="r2ui-mime-label"><?php esc_html_e( 'Never upload these file types', 'cloudflare-r2-offload' ); ?></span>
                        <div class="r2ui-chips" id="r2ui-chips">
                            <input type="text" id="r2ui-chip-input" aria-labelledby="r2ui-mime-label" placeholder="<?php esc_attr_e( 'Add type, e.g. image/gif — press Enter', 'cloudflare-r2-offload' ); ?>" spellcheck="false">
                        </div>
                        <textarea name="r2_offload_excluded_mime_types" id="r2ui-mime" hidden><?php echo esc_textarea( implode( "\n", $excluded ) ); ?></textarea>
                    </div>
                    <div class="r2ui-row">
                        <div>
                            <span class="r2ui-row-title"><?php esc_html_e( 'R2 File Manager', 'cloudflare-r2-offload' ); ?></span>
                            <span class="r2ui-help"><?php esc_html_e( 'Adds a menu to browse and delete bucket objects. Admins only.', 'cloudflare-r2-offload' ); ?></span>
                        </div>
                        <label class="r2ui-switch">
                            <input type="checkbox" role="switch" name="r2_offload_file_manager_enabled" value="1" <?php checked( $s->get_file_manager_enabled() ); ?>>
                            <span class="screen-reader-text"><?php esc_html_e( 'R2 File Manager', 'cloudflare-r2-offload' ); ?></span>
                        </label>
                    </div>
                </section>

                <div class="r2ui-savebar" role="region" aria-label="<?php esc_attr_e( 'Save changes', 'cloudflare-r2-offload' ); ?>">
                    <span id="r2ui-dirty" aria-live="polite"><?php esc_html_e( 'All changes saved', 'cloudflare-r2-offload' ); ?></span>
                    <button type="button" class="button" id="r2ui-discard"><?php esc_html_e( 'Discard', 'cloudflare-r2-offload' ); ?></button>
                    <button type="submit" class="button button-primary" id="r2ui-save"><?php esc_html_e( 'Save changes', 'cloudflare-r2-offload' ); ?></button>
                </div>
            </form>
        </div>
        <?php
    }
}

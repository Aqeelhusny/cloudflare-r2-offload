<?php
namespace R2Offload\Admin;

use R2Offload\Settings;

defined( 'ABSPATH' ) || exit;

class SettingsPage {

    private Settings $settings;

    public function __construct( Settings $settings ) {
        $this->settings = $settings;
    }

    public function render(): void {
        ?>
        <div class="wrap r2-offload-wrap">
            <h1><?php esc_html_e( 'R2 Offload — Settings', 'cloudflare-r2-offload' ); ?></h1>

            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php settings_fields( Settings::OPTION_GROUP ); ?>

                <!-- ======================== R2 Connection ======================== -->
                <h2 class="r2-section-title"><?php esc_html_e( 'R2 Connection', 'cloudflare-r2-offload' ); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="r2_account_id"><?php esc_html_e( 'Account ID', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="text" id="r2_account_id" name="r2_offload_account_id"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_account_id', '' ) ); ?>"
                                   class="regular-text" autocomplete="off" />
                            <p class="description"><?php esc_html_e( 'Your 32-character Cloudflare Account ID.', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_access_key_id"><?php esc_html_e( 'Access Key ID', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="text" id="r2_access_key_id" name="r2_offload_access_key_id"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_access_key_id', '' ) ); ?>"
                                   class="regular-text" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_secret_key"><?php esc_html_e( 'Secret Access Key', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <?php $has_secret = ! empty( get_option( 'r2_offload_secret_access_key', '' ) ); ?>
                            <input type="password" id="r2_secret_key" name="r2_offload_secret_access_key"
                                   value="<?php echo $has_secret ? '__R2_SECRET_UNCHANGED__' : ''; ?>"
                                   class="regular-text" autocomplete="new-password" />
                            <?php if ( $has_secret ) : ?>
                                <p class="description"><?php esc_html_e( 'A secret key is saved. Clear this field and enter a new one to replace it, or leave it as-is to keep the existing key.', 'cloudflare-r2-offload' ); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_bucket"><?php esc_html_e( 'Bucket Name', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="text" id="r2_bucket" name="r2_offload_bucket"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_bucket', '' ) ); ?>"
                                   class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Test Connection', 'cloudflare-r2-offload' ); ?></th>
                        <td>
                            <button type="button" id="r2-test-connection" class="button button-secondary">
                                <?php esc_html_e( 'Test Connection', 'cloudflare-r2-offload' ); ?>
                            </button>
                            <span id="r2-connection-result" class="r2-inline-result"></span>
                        </td>
                    </tr>
                </table>

                <!-- ======================== Delivery ======================== -->
                <h2 class="r2-section-title"><?php esc_html_e( 'Delivery', 'cloudflare-r2-offload' ); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="r2_custom_domain"><?php esc_html_e( 'Custom Domain', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="text" id="r2_custom_domain" name="r2_offload_custom_domain"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_custom_domain', '' ) ); ?>"
                                   class="regular-text" placeholder="cdn.example.com" />
                            <p class="description"><?php esc_html_e( 'Hostname only — no scheme (e.g. cdn.example.com). Leave empty to use the R2 public URL.', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_url_scheme"><?php esc_html_e( 'URL Scheme', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <select id="r2_url_scheme" name="r2_offload_url_scheme">
                                <option value="https" <?php selected( get_option( 'r2_offload_url_scheme', 'https' ), 'https' ); ?>>https</option>
                                <option value="http"  <?php selected( get_option( 'r2_offload_url_scheme', 'https' ), 'http' ); ?>>http</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_path_prefix"><?php esc_html_e( 'Path Prefix', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="text" id="r2_path_prefix" name="r2_offload_path_prefix"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_path_prefix', 'wp-content/uploads' ) ); ?>"
                                   class="regular-text" />
                            <p class="description"><?php esc_html_e( 'Object key prefix in R2 (no leading/trailing slash). Should match your WordPress upload path.', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                </table>

                <!-- ======================== Behavior ======================== -->
                <h2 class="r2-section-title"><?php esc_html_e( 'Behavior', 'cloudflare-r2-offload' ); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Auto-upload New Media', 'cloudflare-r2-offload' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="r2_offload_upload_on_save" value="1"
                                       <?php checked( get_option( 'r2_offload_upload_on_save', 1 ), 1 ); ?> />
                                <?php esc_html_e( 'Automatically upload new media to R2 when uploaded to WordPress.', 'cloudflare-r2-offload' ); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Delete Local Files', 'cloudflare-r2-offload' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="r2_offload_delete_local" value="1"
                                       <?php checked( get_option( 'r2_offload_delete_local', 0 ), 1 ); ?> />
                                <?php esc_html_e( 'Delete local files after a confirmed upload to R2.', 'cloudflare-r2-offload' ); ?>
                            </label>
                            <p class="description" style="color:#d63638;">
                                <?php esc_html_e( 'Warning: This is irreversible. Only enable if R2 is your sole storage.', 'cloudflare-r2-offload' ); ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e( 'Enable File Manager', 'cloudflare-r2-offload' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="r2_offload_file_manager_enabled" value="1"
                                       <?php checked( get_option( 'r2_offload_file_manager_enabled', 0 ), 1 ); ?> />
                                <?php esc_html_e( 'Show the R2 File Manager and Logs in the admin menu.', 'cloudflare-r2-offload' ); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_batch_size"><?php esc_html_e( 'Migration Batch Size', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="number" id="r2_batch_size" name="r2_offload_batch_size"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_batch_size', 10 ) ); ?>"
                                   min="1" max="50" class="small-text" />
                            <p class="description"><?php esc_html_e( 'Attachments processed per WP-Cron batch (1–50). Lower values are safer on shared hosting.', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_multipart_threshold"><?php esc_html_e( 'Multipart Upload Threshold', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="number" id="r2_multipart_threshold" name="r2_offload_multipart_threshold"
                                   value="<?php echo esc_attr( (int) get_option( 'r2_offload_multipart_threshold', 5 * 1024 * 1024 ) / 1024 / 1024 ); ?>"
                                   min="5" class="small-text" /> MB
                            <p class="description"><?php esc_html_e( 'Files larger than this will use multipart upload (minimum 5 MB).', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_multipart_concurrency"><?php esc_html_e( 'Multipart Concurrency', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <input type="number" id="r2_multipart_concurrency" name="r2_offload_multipart_concurrency"
                                   value="<?php echo esc_attr( get_option( 'r2_offload_multipart_concurrency', 3 ) ); ?>"
                                   min="1" max="10" class="small-text" />
                            <p class="description"><?php esc_html_e( 'Number of parallel part uploads (1–10).', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="r2_excluded_mime"><?php esc_html_e( 'Excluded MIME Types', 'cloudflare-r2-offload' ); ?></label></th>
                        <td>
                            <?php
                            $excluded = get_option( 'r2_offload_excluded_mime_types', [] );
                            if ( ! is_array( $excluded ) ) $excluded = [];
                            ?>
                            <textarea id="r2_excluded_mime" name="r2_offload_excluded_mime_types"
                                      rows="4" class="large-text"><?php echo esc_textarea( implode( "\n", $excluded ) ); ?></textarea>
                            <p class="description"><?php esc_html_e( 'One MIME type per line (e.g. video/mp4). These file types will not be uploaded to R2.', 'cloudflare-r2-offload' ); ?></p>
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

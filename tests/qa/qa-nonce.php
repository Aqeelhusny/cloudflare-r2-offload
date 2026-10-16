<?php
/**
 * QA-only mu-plugin: hands the CURRENT user their own r2_offload nonce.
 * Models a leaked nonce, so only the plugin's capability check can stop a low-privilege user.
 */
add_action( 'wp_ajax_qa_nonce', function () {
    wp_send_json( [ 'n' => wp_create_nonce( 'r2_offload_nonce' ) ] );
} );

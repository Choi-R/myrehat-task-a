<?php
/**
 * MyRehat Test child theme - functions.php.
 * Fixes for PHP bugs B1, B2, and B3.
 */

add_action( 'wp_enqueue_scripts', 'myrehat_test_assets' );
function myrehat_test_assets() {
    wp_enqueue_style( 'myrehat-test-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_script(
        'myrehat-test-trails',
        get_stylesheet_directory_uri() . '/trails.js',
        array(),
        '1.0.0',
        true
    );
}

// FIX B1: Added missing text domain 'myrehat-test'
function myrehat_test_booking_title() {
    return __( 'Book a guided hike', 'myrehat-test' );
}

// FIX B2: Added nonce verification and sanitization for POST inputs
add_action( 'template_redirect', 'myrehat_test_booking_handler' );
function myrehat_test_booking_handler() {
    if ( isset( $_POST['trails_booking'] ) ) {
        // Verify nonce
        if ( ! isset( $_POST['trails_booking_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['trails_booking_nonce'] ) ), 'trails_booking_action' ) ) {
            return;
        }

        // Sanitize date input
        if ( isset( $_POST['date'] ) ) {
            $date = sanitize_text_field( wp_unslash( $_POST['date'] ) );
            set_transient( 'trails_last_booking', $date, HOUR_IN_SECONDS );
        }
    }
}

// FIX B3: Set accepted_args to 2 so $trail_id and $count are properly passed
add_action( 'myrehat_trail_viewed', 'myrehat_test_count_view', 10, 2 );
function myrehat_test_count_view( $trail_id, $count = 1 ) {
    if ( empty( $trail_id ) ) {
        return;
    }

    $key   = 'trail_views_' . sanitize_key( $trail_id );
    $total = (int) get_option( $key, 0 );
    update_option( $key, $total + (int) $count );
}

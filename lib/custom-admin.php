<?php
// remove unwanted dashboard widgets for relevant users
function remove_meta_boxes() {
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_meta_boxes' );

function remove_product_meta_boxes() {
        remove_post_type_support( 'product', 'editor' );
}
add_action( 'admin_init', 'remove_product_meta_boxes', 40 );

function custom_admin_colors() {
    $theme_dir = get_stylesheet_directory_uri();
    wp_admin_css_color(
        'centrum', __('Centrum'),
        $theme_dir . '/admin_colors/centrum/colors.css',
        array('#ffffff', '#ceaa3b', '#0e0f0b', '#eeeeee')
    );
}
add_action( 'admin_init', 'custom_admin_colors' );

function remove_admin_footer_text() {
    return '';
}
add_action( 'admin_footer_text', 'remove_admin_footer_text' );

function remove_footer_version_number() {
    remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'remove_footer_version_number' );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
?>

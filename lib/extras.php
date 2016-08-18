<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function add_custom_mime_types($mimes){
	return array_merge($mimes,array (
    'svg' => 'image/svg+xml'
	));
}
add_filter('upload_mimes', __NAMESPACE__ . '\\add_custom_mime_types');


// register new taxonomy which applies to attachments
function wptp_add_floorplan_taxonomy() {
    $labels = array(
        'name'              => 'Floorplans',
        'singular_name'     => 'Floorplan',
        'search_items'      => 'Search Floorplans',
        'all_items'         => 'All Floorplans',
        'parent_item'       => 'Parent Floorplan',
        'parent_item_colon' => 'Parent Floorplan:',
        'edit_item'         => 'Edit Floorplan',
        'update_item'       => 'Update Floorplan',
        'add_new_item'      => 'Add New Floorplan',
        'new_item_name'     => 'New Floorplan Name',
        'menu_name'         => 'Floorplan',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );

    register_taxonomy( 'floorplan', 'attachment', $args );
}
add_action( 'init', __NAMESPACE__ . '\\wptp_add_floorplan_taxonomy' );

//
//    Adds Foundation classes to next/prev buttons
//
//////////////////////////////////////////////////////////////////////
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="button tiny"';
}

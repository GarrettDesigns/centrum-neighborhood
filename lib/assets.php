<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function assets() {

  wp_enqueue_style('slick_css', asset_path('styles/owl-carousel.css'), false, null);
  wp_enqueue_style('slick_theme', asset_path('styles/owl-theme.css'), false, null);
  wp_enqueue_style('stacktable_css', asset_path('styles/stacktable.css'), false, null);
  wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('owl-carousel', asset_path('scripts/owl-carousel.js'), ['jquery'], null, false);
	wp_enqueue_script('info-bubble', asset_path('scripts/infobubble.js'), ['jquery'], null, false);
  wp_enqueue_script('stacktable_js', asset_path('scripts/stacktable.js'), ['jquery'], null, false);
  wp_enqueue_script('iconic_js', asset_path('scripts/iconic.min.js'), ['jquery'], null, false);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);

  // Localize the script with new data
  $map_location_data = array(
    'lakeview_dining_markers' => get_field('dining_location_coordinates', 12),
    'lakeview_grocery_markers' => get_field('grocery_location_coordinates', 12),
    'lakeview_fitness_markers' => get_field('fitness_location_coordinates', 12),
    'lakeview_salons_markers' => get_field('salons_location_coordinates', 12),
    'lakeview_coffee_markers' => get_field('coffee_location_coordinates', 12),
    'lakeview_education_markers' => get_field('education_location_coordinates', 12),
    'lakeview_retail_markers' => get_field('retail_location_coordinates', 12)
  );

  wp_localize_script( 'sage_js', 'map_locations', $map_location_data );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . asset_path('styles/custom-login-styles.css') . '" />';
}
add_action('login_head',  __NAMESPACE__ . '\\my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\\my_login_logo_url' );

function my_login_logo_url_title() {
return 'www.centrumlakeview.com';
}
add_filter( 'login_headertitle', __NAMESPACE__ . '\\my_login_logo_url_title' );

function login_error_override()
{
    return 'Incorrect login details.';
}
add_filter('login_errors', __NAMESPACE__ . '\\login_error_override');

function login_checked_remember_me() {
add_filter( 'login_footer', __NAMESPACE__ . '\\rememberme_checked' );
}
add_action( 'init', __NAMESPACE__ . '\\login_checked_remember_me' );

function rememberme_checked() {
echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

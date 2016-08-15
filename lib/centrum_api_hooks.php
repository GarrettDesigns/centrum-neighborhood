<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function centrum_get_floorplans( $data ) {
  $floorplan_args = array(
      'post_type' => 'attachment',
      'post_status' => 'inherit',
      'tax_query' => array (
          array(
              'taxonomy' => 'floorplan',
              'field' => 'slug',
              'terms' => $data['floorplanCode'],
          ),
      ),
  );

   $floorplans = new WP_Query( $floorplan_args );

   return $floorplans;
}

function centrum_register_api_hooks() {
    $namespace = 'centrum/v1';

	register_rest_route( $namespace, '/floorplan/(?P<floorplanCode>.+)', array(
		'methods' => 'GET',
		'callback' => 'centrum_get_floorplans',
	) );
};
add_action( 'rest_api_init', 'centrum_register_api_hooks' );

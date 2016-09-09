<?php
function ctrm_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'welcome_to_your_site', // Widget slug
        'Welcome!', // Title
        'ctrm_welcome_widget_function'
    );
}
add_action( 'wp_dashboard_setup', 'ctrm_add_dashboard_widget' );

function ctrm_welcome_widget_function() {
    if ( is_user_logged_in() ) {
        $user_info = wp_get_current_user();
        $username = $user_info->user_firstname;
        echo "Hello " . $username . "!";
        echo "\n";
        echo "Welcome to " . get_bloginfo($show='name');
    }
}
?>

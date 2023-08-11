<?php
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );
/**
* Add Analysis widgets to the dashboard. This is called on wp_dashboard_setup action hook
*/
function add_dashboard_widgets() {
	wp_add_dashboard_widget( 'dashboard_widget', 'Analysis Graph', 'draw_graph_html' );
}
/**
* Draws the graph HTML. This is a callback function that should be used by plugins to render the graph HTML.
* 
* @param $post
* @param $callback_args
*/
function draw_graph_html( $post, $callback_args ) {
	require_once PLUGIN_DIR_PATH . 'templates/app.php';
}


add_action( 'admin_enqueue_scripts', 'add_css_javascript_file' );
/**
* Add css and js file. This is called by admin_enqueue_scripts action hook
*/
function add_css_javascript_file() {
    wp_enqueue_style( 'gw-style', PLUGIN_DIR_URL . 'build/index.css' );
    wp_enqueue_script( 'gw-script', PLUGIN_DIR_URL . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
}


add_action( 'rest_api_init', 'register_meta_data_with_wp_rest_api');
/**
* Register post metadata with WP REST API.
*/
function register_meta_data_with_wp_rest_api() {
    register_rest_field( 'analysis',
       'impression',
       array(
          'get_callback'    => 'set_post_meta_in_wp_rest_response',
          'schema'          => null,
       )
    );
    register_rest_field( 'analysis',
       'click',
       array(
          'get_callback'    => 'set_post_meta_in_wp_rest_response',
          'schema'          => null,
       )
    );
    register_rest_field( 'analysis',
       'date',
       array(
          'get_callback'    => 'set_post_meta_in_wp_rest_response',
          'schema'          => null,
       )
    );
   
}
/**
* Sets post meta field in the REST response. 
* 
* @param $object
* @param $field_name
* @param $request
* 
* @return The value of the field if it exists. False if it doesn't exist or is not a valid value
*/
function set_post_meta_in_wp_rest_response( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
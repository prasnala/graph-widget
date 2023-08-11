<?php

add_action( 'init', 'create_analysis_cpt' );
/**
* Create Analysis post type on plugin activation This function is attached to the'init'action hook. The function registers the post type
*/
function create_analysis_cpt() {

    $args = array(
        'label'                => 'Analysiss',
        'public'               => true,
        'show_in_rest' => true,
        'register_meta_box_cb' => 'parameter_meta_box'
    );

    register_post_type( 'analysis', $args );
    //insert_analysis_post_on_plugin_activation();
    //insert_analysis_postmeta_on_plugin_activation();
}
/**
* Add metabox to analysis  post_type edit screens. This is used to show the parameters that are available for analysis
*/
function parameter_meta_box() {

    add_meta_box(
        'analysis-parameters',
        __( 'Parameters', 'sitepoint' ),
        'parameter_meta_box_callback'
    );

}
/**
* Callback for post meta on parameter metabox edit screens. Adds nonce field to to check later
* 
* @param $post - The current post object
*/
function parameter_meta_box_callback( $post ) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'parameter_nonce', 'parameter_nonce' );

    $impression = get_post_meta( $post->ID, 'impression', true );
    $click = get_post_meta( $post->ID, 'click', true );
    $date = get_post_meta( $post->ID, 'date', true );
    ?>
    <label for="impression">impression count:</label>
    <input type="text" id="impression" name="impression" value="<?php echo $impression ?>"><br><br>
    <label for="click">click count:</label>
    <input type="text" id="click" name="click" value="<?php echo $click ?>"><br><br>
    <label for="date">date:</label>
    <input type="text" id="date" name="date" value="<?php echo $date ?>">

    <?php
}


add_action( 'save_post', 'save_parameter_meta_box_data' );
/**
* Save the data for the custom fields or metadata.
* 
* @param $post_id
* 
* @return Returns early if nonce is invalid or user doesn't have permissions to save the data. Returns null
*/
function save_parameter_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['parameter_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['parameter_nonce'], 'parameter_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Checks if the current user is allowed to edit the current page or post.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        // If the current user is not allowed to edit the page.
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    }
    else {

        // If the current user is not allowed to edit a post.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    // Update the impression field in the database.
    if ( isset( $_POST['impression'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['impression'] );
    
        // Update the meta field in the database.
        update_post_meta( $post_id, 'impression', $my_data );
    }
    // Update the click field in the database.
    if ( isset( $_POST['click'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['click'] );
    
        // Update the meta field in the database.
        update_post_meta( $post_id, 'click', $my_data );
    }
    // Update the post meta field in the database.
    if ( isset( $_POST['date'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['date'] );
    
        // Update the meta field in the database.
        update_post_meta( $post_id, 'date', $my_data );
    }
    

}

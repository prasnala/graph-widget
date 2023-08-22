<?php
register_activation_hook( PLUGIN_MAIN_FILE, 'on_plugin_activation' );
/**
* This function runs when the plugin is activated. 
*/
function on_plugin_activation() { 
	// Trigger our function that registers the custom post type plugin.
	create_analysis_cpt(); 
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
    insert_analysis_post_on_plugin_activation();
    insert_analysis_postmeta_on_plugin_activation();
    
}
/**
* insert 30 analysis posts in db table wp_posts on plugin activation 
*/
function insert_analysis_post_on_plugin_activation(){
    global $wpdb;

    //SELECT * FROM `wp_posts` where post_status="publish" and post_type="analysis";
    //add here
    $sql = $wpdb->prepare(
    "INSERT INTO `".$wpdb->prefix."posts` (`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
    (1, '2023-08-05 19:35:16', '2023-08-05 19:35:16', '', '1 jully', '', 'publish', 'closed', 'closed', '', '1-jully', '', '', '2023-08-05 19:43:06', '2023-08-05 19:43:06', '', 0, 'http://test.in/?post_type=analysis&#038;p=14', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:44:32', '2023-08-05 19:44:32', '', '2 jully', '', 'publish', 'closed', 'closed', '', '2-jully', '', '', '2023-08-05 19:44:32', '2023-08-05 19:44:32', '', 0, 'http://test.in/?post_type=analysis&#038;p=15', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:45:20', '2023-08-05 19:45:20', '', '3 jully', '', 'publish', 'closed', 'closed', '', '3-jully', '', '', '2023-08-05 19:45:20', '2023-08-05 19:45:20', '', 0, 'http://test.in/?post_type=analysis&#038;p=16', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:48:30', '2023-08-05 19:48:30', '', '4 jully', '', 'publish', 'closed', 'closed', '', '4-jully', '', '', '2023-08-05 19:48:30', '2023-08-05 19:48:30', '', 0, 'http://test.in/?post_type=analysis&#038;p=17', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:49:45', '2023-08-05 19:49:45', '', '5 jully', '', 'publish', 'closed', 'closed', '', '5-jully', '', '', '2023-08-05 19:49:45', '2023-08-05 19:49:45', '', 0, 'http://test.in/?post_type=analysis&#038;p=18', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:50:10', '2023-08-05 19:50:10', '', '6 jully', '', 'publish', 'closed', 'closed', '', '6-jully', '', '', '2023-08-05 19:50:10', '2023-08-05 19:50:10', '', 0, 'http://test.in/?post_type=analysis&#038;p=19', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:50:39', '2023-08-05 19:50:39', '', '7 jully', '', 'publish', 'closed', 'closed', '', '7-jully', '', '', '2023-08-05 19:50:39', '2023-08-05 19:50:39', '', 0, 'http://test.in/?post_type=analysis&#038;p=20', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:51:22', '2023-08-05 19:51:22', '', '8 jully', '', 'publish', 'closed', 'closed', '', '8-jully', '', '', '2023-08-05 19:51:22', '2023-08-05 19:51:22', '', 0, 'http://test.in/?post_type=analysis&#038;p=21', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:52:04', '2023-08-05 19:52:04', '', '9 jully', '', 'publish', 'closed', 'closed', '', '9-jully', '', '', '2023-08-05 19:52:04', '2023-08-05 19:52:04', '', 0, 'http://test.in/?post_type=analysis&#038;p=22', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:52:33', '2023-08-05 19:52:33', '', '10 jully', '', 'publish', 'closed', 'closed', '', '10-jully', '', '', '2023-08-05 19:52:33', '2023-08-05 19:52:33', '', 0, 'http://test.in/?post_type=analysis&#038;p=23', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:53:15', '2023-08-05 19:53:15', '', '11 jully', '', 'publish', 'closed', 'closed', '', '11-jully', '', '', '2023-08-05 19:53:15', '2023-08-05 19:53:15', '', 0, 'http://test.in/?post_type=analysis&#038;p=24', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:53:46', '2023-08-05 19:53:46', '', '12 jully', '', 'publish', 'closed', 'closed', '', '12-jully', '', '', '2023-08-05 19:53:46', '2023-08-05 19:53:46', '', 0, 'http://test.in/?post_type=analysis&#038;p=25', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:54:49', '2023-08-05 19:54:49', '', '13 jully', '', 'publish', 'closed', 'closed', '', '13-jully', '', '', '2023-08-05 19:54:49', '2023-08-05 19:54:49', '', 0, 'http://test.in/?post_type=analysis&#038;p=26', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:55:24', '2023-08-05 19:55:24', '', '14 jully', '', 'publish', 'closed', 'closed', '', '14-jully', '', '', '2023-08-05 19:55:24', '2023-08-05 19:55:24', '', 0, 'http://test.in/?post_type=analysis&#038;p=27', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:56:21', '2023-08-05 19:56:21', '', '15 jully', '', 'publish', 'closed', 'closed', '', '15-jully', '', '', '2023-08-05 19:56:21', '2023-08-05 19:56:21', '', 0, 'http://test.in/?post_type=analysis&#038;p=28', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:56:56', '2023-08-05 19:56:56', '', '16 jully', '', 'publish', 'closed', 'closed', '', '16-jully', '', '', '2023-08-05 19:56:56', '2023-08-05 19:56:56', '', 0, 'http://test.in/?post_type=analysis&#038;p=30', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:57:27', '2023-08-05 19:57:27', '', '17 jully', '', 'publish', 'closed', 'closed', '', '17-jully', '', '', '2023-08-05 19:57:27', '2023-08-05 19:57:27', '', 0, 'http://test.in/?post_type=analysis&#038;p=31', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:58:00', '2023-08-05 19:58:00', '', '18 jully', '', 'publish', 'closed', 'closed', '', '18-jully', '', '', '2023-08-05 19:58:00', '2023-08-05 19:58:00', '', 0, 'http://test.in/?post_type=analysis&#038;p=32', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:58:32', '2023-08-05 19:58:32', '', '19 jully', '', 'publish', 'closed', 'closed', '', '19-jully', '', '', '2023-08-05 19:58:32', '2023-08-05 19:58:32', '', 0, 'http://test.in/?post_type=analysis&#038;p=33', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:58:59', '2023-08-05 19:58:59', '', '20 jully', '', 'publish', 'closed', 'closed', '', '20-jully', '', '', '2023-08-05 19:58:59', '2023-08-05 19:58:59', '', 0, 'http://test.in/?post_type=analysis&#038;p=34', 0, 'analysis', '', 0),
    (1, '2023-08-05 19:59:39', '2023-08-05 19:59:39', '', '21 jully', '', 'publish', 'closed', 'closed', '', '21-jully', '', '', '2023-08-05 19:59:39', '2023-08-05 19:59:39', '', 0, 'http://test.in/?post_type=analysis&#038;p=36', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:00:04', '2023-08-05 20:00:04', '', '22 jully', '', 'publish', 'closed', 'closed', '', '22-jully', '', '', '2023-08-05 20:00:04', '2023-08-05 20:00:04', '', 0, 'http://test.in/?post_type=analysis&#038;p=37', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:00:29', '2023-08-05 20:00:29', '', '23 jully', '', 'publish', 'closed', 'closed', '', '23-jully', '', '', '2023-08-05 20:00:29', '2023-08-05 20:00:29', '', 0, 'http://test.in/?post_type=analysis&#038;p=38', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:00:57', '2023-08-05 20:00:57', '', '24 jully', '', 'publish', 'closed', 'closed', '', '24-jully', '', '', '2023-08-05 20:01:13', '2023-08-05 20:01:13', '', 0, 'http://test.in/?post_type=analysis&#038;p=39', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:01:58', '2023-08-05 20:01:58', '', '25 jully', '', 'publish', 'closed', 'closed', '', '25-jully', '', '', '2023-08-05 20:01:58', '2023-08-05 20:01:58', '', 0, 'http://test.in/?post_type=analysis&#038;p=41', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:02:23', '2023-08-05 20:02:23', '', '26 jully', '', 'publish', 'closed', 'closed', '', '26-jully', '', '', '2023-08-05 20:02:23', '2023-08-05 20:02:23', '', 0, 'http://test.in/?post_type=analysis&#038;p=42', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:02:55', '2023-08-05 20:02:55', '', '27 jully', '', 'publish', 'closed', 'closed', '', '27-jully', '', '', '2023-08-05 20:02:55', '2023-08-05 20:02:55', '', 0, 'http://test.in/?post_type=analysis&#038;p=43', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:03:17', '2023-08-05 20:03:17', '', '28 jully', '', 'publish', 'closed', 'closed', '', '28-jully', '', '', '2023-08-05 20:03:17', '2023-08-05 20:03:17', '', 0, 'http://test.in/?post_type=analysis&#038;p=44', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:03:45', '2023-08-05 20:03:45', '', '29 jully', '', 'publish', 'closed', 'closed', '', '29-jully', '', '', '2023-08-05 20:03:45', '2023-08-05 20:03:45', '', 0, 'http://test.in/?post_type=analysis&#038;p=45', 0, 'analysis', '', 0),
    (1, '2023-08-05 20:04:10', '2023-08-05 20:04:10', '', '30 jully', '', 'publish', 'closed', 'closed', '', '30-jully', '', '', '2023-08-05 20:04:10', '2023-08-05 20:04:10', '', 0, 'http://test.in/?post_type=analysis&#038;p=46', 0, 'analysis', '', 0);
    ");
    //print_r($sql); die(" Test");
    $wpdb->query($sql);

}
/**
* insert analysis metadata impression, click and date on plugin activation
*/
function insert_analysis_postmeta_on_plugin_activation(){
    global $wpdb;
    $last_30_ids = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT ID FROM ".$wpdb->prefix."posts ORDER BY ID DESC LIMIT 30"
        ), ARRAY_N
    );

    //add here
    $analysis_meta = array (
        array(100,9,'01/07'),
        array(90,9,'02/07'),
        array(80,8,'03/07'),
        array(70,7,'04/07'),
        array(60,10,'05/07'),
        array(50,11,'06/07'),
        array(40,12,'07/07'),
        array(30,16,'08/07'),
        array(40,19,'09/07'),
        array(60,30,'10/07'),
        array(80,79,'11/07'),
        array(100,100,'12/07'),
        array(120,70,'13/07'),
        array(140,30,'14/07'),
        array(160,60,'15/07'),
        array(180,90,'16/07'),
        array(200,20,'17/07'),
        array(190,78,'18/07'),
        array(180,18,'19/07'),
        array(170,29,'20/07'),
        array(150,30,'21/07'),
        array(100,30,'22/07'),
        array(150,15,'23/07'),
        array(170,34,'24/07'),
        array(90,27,'25/07'),
        array(100,60,'26/07'),
        array(50,20,'27/07'),
        array(20,20,'28/07'),
        array(10,7,'28/07'),
        array(70,50,'30/07')
    );

    // Insert analysis meta data into the database.
    for($i=0; $i<count($analysis_meta); $i++){
        $sql = $wpdb->prepare(
        "INSERT INTO `".$wpdb->prefix."postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES (".$last_30_ids[$i][0].", 'impression', '".$analysis_meta[$i][0]."')");
        $wpdb->query($sql);
        $sql = $wpdb->prepare(
        "INSERT INTO `".$wpdb->prefix."postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES (".$last_30_ids[$i][0].", 'click', '".$analysis_meta[$i][1]."')");
        $wpdb->query($sql);
        $sql = $wpdb->prepare(
        "INSERT INTO `".$wpdb->prefix."postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES (".$last_30_ids[$i][0].", 'date', '".$analysis_meta[$i][2]."')");
        $wpdb->query($sql);
    }

}

register_deactivation_hook( PLUGIN_MAIN_FILE, 'on_plugin_deactivation' );
/**
* Remove analysis cpt and its metadata  when plugin is deactivated This is called on plugin deactivation so we don't need to worry.
*/
function on_plugin_deactivation() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'analysis' );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
    delete_all_analysis_posts();
    delete_all_analysis_postmetas();
}
/**
* Delete all analysis posts from the database This is used to clean out all old analysis posts that were created.
*/
function delete_all_analysis_posts(){
    global $wpdb;
    $sql = $wpdb->prepare('delete from '.$wpdb->prefix.'posts where post_type="analysis";');
    $wpdb->query($sql);
}
/**
* Delete impression click and date postmeta from database for analysis cpt
*/
function delete_all_analysis_postmetas(){
    global $wpdb;
    $sql = $wpdb->prepare('delete from '.$wpdb->prefix.'postmeta where meta_key in ("impression","click", "date")');
    $wpdb->query($sql);
}


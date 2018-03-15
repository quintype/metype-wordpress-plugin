<?php
/*
*Plugin Name: Metype Engagement-engine
*/
function metype_moderate_comments_render() {
	require_once plugin_dir_path( __FILE__ ) . '/metype-admin.php';
}

function metype_contruct_admin_menu() {
	if ( ! current_user_can( 'moderate_comments' ) ) {
		return;
	}

        // Replace the existing WordPress comments menu item to prevent confusion
        // about where to administer comments. The Disqus page will have a link to
        // see WordPress comments.
	remove_menu_page( 'edit-comments.php' );

	add_menu_page(
		'metype',
		'Metype',
		'moderate_comments',
		'metype',
		'metype_moderate_comments_render',
		'dashicons-admin-comments',
		24
	);
	add_action( 'admin_init', 'update_extra_post_info' );
}

function update_extra_post_info() {
  register_setting( 'metype-settings', 'metype-account-id' );
}

function metype_construct_admin_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
}

function my_plugin_comment_template( $comment_template ) {
	return dirname(__FILE__) . '/h1.php';
}

function add_metype_script() {
    echo '<script type=\'text/javascript\'>window.talktype = window.talktype || function(f) {(talktype.q = talktype.q || []).push(arguments);};</script><script src=\'https://staging.metype.com/quintype-metype/assets/application.js\'></script>';
}

add_action('wp_head', 'add_metype_script');
add_action( 'admin_menu', 'metype_contruct_admin_menu' );
add_filter( "comments_template", "my_plugin_comment_template" );
?>
<?php
/*
*Plugin Name: Metype Engagement-engine
*/
function metype_moderate_comments_render() {
    require_once plugin_dir_path( __FILE__ ) . '/metype-admin.php';
}

function metype_construct_admin_menu() {
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
    add_action( 'admin_init', 'update_emetype_settings_info' );
}

function update_emetype_settings_info() {
    register_setting( 'metype-settings', 'metype-account-id' );
    register_setting( 'metype-settings', 'metype-primary-color' );
    register_setting( 'metype-settings', 'metype-bg-color' );
    register_setting( 'metype-settings', 'metype-font-color' );
}

function metype_construct_admin_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'comments' );
}

function my_plugin_comment_template( $comment_template ) {
    return dirname(__FILE__) . '/metype-widget-template.php';
}

function add_metype_script() {
    echo '<script type=\'text/javascript\'>window.talktype = window.talktype || function(f) {(talktype.q = talktype.q || []).push(arguments);};</script><script src=\'https://staging.metype.com/quintype-metype/assets/application.js\'></script>';
}

//Add application.js to the head of the page
add_action('wp_head', 'add_metype_script');

//Construct admin menu
add_action( 'admin_menu', 'metype_construct_admin_menu' );

//Insert custom comment template
add_filter( "comments_template", "my_plugin_comment_template" );


//Add feedwidget js to page
wp_enqueue_script( 'feed_widget_js', plugin_dir_url( __FILE__ ) . 'scripts/feed_widget.js' );

//Add feedwidget css to page
wp_enqueue_style( 'feed_widget_css', plugin_dir_url( __FILE__ ) . 'styles/feed_widget.css' );

//Send configuration variables to populate in feed widget
wp_localize_script( 'feed_widget_js', 'php_vars', array(
    'metypeAccountId' => get_option('metype-account-id'),
    'metypePrimaryColor' => get_option('metype-primary-color'),
    'metypeBgColor' => get_option('metype-bg-color'),
    'metypeFontColor' => get_option('metype-font-color')
));

?>
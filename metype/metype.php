<?php
/*
* Plugin Name:  Metype for WordPress
* Plugin URI: https://www.metype.com
* Description:  Metype helps publishers build user communities where users can get live updates about comments, reactions and have conversations in realtime.
Version: 0.0.1
* Author:            Metype
* Author URI:        https://www.metype.com
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

// Admin related changes start
function render_metype_admin() {
  require_once plugin_dir_path( __FILE__ ) . '/metype-admin.php';
}

//Insert metype admin CSS
wp_enqueue_style('metype_admin_css', plugin_dir_url( __FILE__ ) . 'styles/metype-admin.css' );

//Register metype configurations to database
function update_metype_settings_info() {
  register_setting( 'metype-settings', 'metype-account-id' );
  register_setting( 'metype-settings', 'metype-primary-color' );
  register_setting( 'metype-settings', 'metype-bg-color' );
  register_setting( 'metype-settings', 'metype-font-color' );
  register_setting( 'metype-settings', 'metype-feed-widget-active' );
}

function metype_admin_menu() {
  if(!current_user_can('moderate_comments')) {
    return;
  }

  // Replace the existing WordPress comments menu item to prevent confusion
  // about where to administer comments.
  remove_menu_page('edit-comments.php');

  add_menu_page(
    'metype',
    'Metype',
    'moderate_comments',
    'metype',
    'render_metype_admin',
    'dashicons-admin-comments',
    24
  );
  add_action('admin_init', 'update_metype_settings_info');
}

// Construct admin menu
add_action('admin_menu', 'metype_admin_menu');

// Admin related changes end

// Widget related changes start

// Metype script
function add_metype_script() {
  echo '<script type=\'text/javascript\'>
          window.talktype = window.talktype || function(f) {
            (talktype.q = talktype.q || []).push(arguments);
          };
        </script>
        <script src=\'https://staging.metype.com/quintype-metype/assets/application.js\'>
        </script>';
}
// Metype comment widget template
function add_metype_comment_template($comment_template) {
  return dirname(__FILE__) . '/metype-comment-widget-template.php';
}

function add_metype_feed_widget() {
  //Add feedwidget js to page
  wp_enqueue_script('feed_widget_js', plugin_dir_url( __FILE__ ) . 'scripts/feed_widget.js' );

  //Add feedwidget css to page
  wp_enqueue_style('feed_widget_css', plugin_dir_url( __FILE__ ) . 'styles/feed-widget.css' );

  //Send configuration variables to populate in feed widget
  wp_localize_script('feed_widget_js', 'php_vars', array(
    'metypeAccountId' => get_option('metype-account-id'),
    'metypePrimaryColor' => get_option('metype-primary-color'),
    'metypeBgColor' => get_option('metype-bg-color'),
    'metypeFontColor' => get_option('metype-font-color')
  ));
}

if(get_option('metype-feed-widget-active') == 1) {
  add_metype_feed_widget();
}

//Insert metype comment template
add_filter('comments_template', 'add_metype_comment_template');

//Add metype application.js to the head of the page
add_action('wp_head', 'add_metype_script');

// Widget related changes end

// Metype activation logic
function activate_metype() {
  update_option('metype-primary-color', '#3a9fdd');
  update_option('metype-bg-color', '#ffffff');
  update_option('metype-font-color', '#4a4a4a');
  update_option('metype-feed-widget-active', 1);
}

register_activation_hook( __FILE__, 'activate_metype' );
?>

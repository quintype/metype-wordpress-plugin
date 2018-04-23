<div  id='metype-container'
      class='iframe-container'
      data-metype-account-id='<?php echo get_option('metype-account-id'); ?>'
      data-metype-host='https://www.metype.com'
      data-metype-primary-color='<?php echo get_option('metype-primary-color'); ?>'
      data-metype-bg-color='<?php echo get_option('metype-bg-id'); ?>'
      data-metype-font-color='<?php echo get_option('metype-font-id'); ?>'>
</div>

<?php
  wp_enqueue_script('metype-widget', plugin_dir_url( __FILE__ ) . 'scripts/metype_commenting_widget.js');
?>

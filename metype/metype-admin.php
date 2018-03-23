<?php
?>

<div class="metype-admin-wrapper">
  <div class="metype-admin-container">
    <h1>Metype plugin settings</h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'metype-settings' ); ?>
      <div class="metype-admin-container__input">
        Metype account id: <input type="text" name="metype-account-id" value="<?php echo get_option('metype-account-id'); ?>"/>
      </div>
      <div class="metype-admin-container__input">
        Primary Color:
        <input type="text" name="metype-primary-color" value="<?php echo get_option('metype-primary-color'); ?>"/> Hex value [Eg: #ffffff]</div>
      <div class="metype-admin-container__input">
        Secondary Color: <input type="text" name="metype-bg-color" value="<?php echo get_option('metype-bg-color'); ?>"/> Hex value [Eg: #ffffff]
      </div>
      <div class="metype-admin-container__input">
        Font Color: <input type="text" name="metype-font-color" value="<?php echo get_option('metype-font-color'); ?>"/> Hex value  [Eg: #ffffff]
      </div>
      <div class="metype-admin-container__input">
        Enable feed widget: <input class="checkbox" type="checkbox" name="metype-feed-widget-active" value="1" <?php checked('1',get_option('metype-feed-widget-active')); ?> />
      </div>
        <?php submit_button(); ?>
    </form>
  </div>
</div>

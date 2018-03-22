<?php
?>

<div id="disqus-admin">
<h1>Metype plugin settings</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'metype-settings' ); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row">Metype account id:</th>
        <td><input type="text" name="metype-account-id" value="<?php echo get_option('metype-account-id'); ?>"/></td>
      </tr>
      <tr valign="top">
        <th scope="row">Primary Color:</th>
        <td><input type="text" name="metype-primary-color" value="<?php echo get_option('metype-primary-color'); ?>"/> Hex value [Eg: #ffff]</td>
      </tr>
      <tr valign="top">
        <th scope="row">Secondary Color:</th>
        <td><input type="text" name="metype-bg-color" value="<?php echo get_option('metype-bg-color'); ?>"/> Hex value [Eg: #ffff]</td>
      </tr>
      <tr valign="top">
        <th scope="row">Font Color:</th>
        <td><input type="text" name="metype-font-color" value="<?php echo get_option('metype-font-color'); ?>"/> Hex value  [Eg: #ffff]</td>
      </tr>
      <tr valign="top">
        <th scope="row">Enable feed widget:</th>
        <td><input type="checkbox" name="metype-feed-widget-active" value="1" <?php checked('1',get_option('metype-feed-widget-active')); ?> /></td>
      </tr>
    </table>
  <?php submit_button(); ?>
  </form>
</div>

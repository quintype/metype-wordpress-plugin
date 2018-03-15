<?php
?>

<div id="disqus-admin">
<h1>Extra Post Info Settings</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'metype-settings' ); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row">Metype account id:</th>
      <td><input type="text" name="metype-account-id" value="<?php echo get_option('metype-account-id'); ?>"/></td>
      </tr>
    </table>
  <?php submit_button(); ?>
  </form>
</div>

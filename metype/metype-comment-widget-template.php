<?php
?>

<div id='metype-container' class='iframe-container'
     data-metype-account-id='<?php echo get_option('metype-account-id'); ?>'
     data-metype-host='https://staging.metype.com/'
     data-metype-primary-color='<?php echo get_option('metype-primary-color'); ?>'
     data-metype-bg-color='<?php echo get_option('metype-bg-id'); ?>'
     data-metype-font-color='<?php echo get_option('metype-font-id'); ?>'>
</div>

<script type='text/javascript'>
  var metypeContainer = document.getElementById("metype-container");
  page_url = metypeContainer.getAttribute("data-metype-page-url");
  metypeContainer.setAttribute('data-metype-page-url', page_url || window.location.href);
  metypeContainer.setAttribute('data-metype-window-height', window.innerHeight);
  metypeContainer.setAttribute('data-metype-screen-width', window.screen.width);
  talktype.commentWidgetIframe(metypeContainer);
</script>
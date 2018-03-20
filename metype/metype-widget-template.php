<?php
?>

<div id='metype-container' class='iframe-container'
     data-metype-account-id='<?php echo get_option('metype-account-id'); ?>'
     data-metype-host='https://staging.metype.com/'
     data-metype-primary-color='primary color of the widget (defaults to blue)'
     data-metype-bg-color='#ffffff'
     data-metype-font-color='#4a4a4a'>
</div>

<script type='text/javascript'>
  var metypeContainer = document.getElementById("metype-container");
  page_url = metypeContainer.getAttribute("data-metype-page-url");
  metypeContainer.setAttribute('data-metype-page-url', page_url || window.location.href);
  metypeContainer.setAttribute('data-metype-window-height', window.innerHeight);
  metypeContainer.setAttribute('data-metype-screen-width', window.screen.width);
  talktype.commentWidgetIframe(metypeContainer);
</script>
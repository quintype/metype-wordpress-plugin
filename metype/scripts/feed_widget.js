(function insert_feed_widget() {
  function slideToggle() {
    talktype && talktype.slideButton();
  }

  function toggleButton() {
    talktype && talktype.toggleButton();
  }

  window.onload = function() {
    var elemDiv = document.createElement('div');
    elemDiv.setAttribute('id', 'feed-metype-container');
    elemDiv.setAttribute('class', 'feed-iframe-container');
    elemDiv.setAttribute('data-metype-account-id', php_vars.metypeAccountId );
    elemDiv.setAttribute('data-metype-primary-color', php_vars.metypePrimaryColor );
    elemDiv.setAttribute('data-metype-secondary-color', php_vars.metypeBgColor );
    elemDiv.setAttribute('data-metype-font-color', php_vars.metypeFontColor );
    elemDiv.setAttribute('data-metype-host', 'https://staging.metype.com');

    var clickThruDiv = document.createElement('div');
    clickThruDiv.setAttribute('id', 'metype-clickthru');
    clickThruDiv.setAttribute('class', 'metype-clickthru');
    clickThruDiv.addEventListener('click', toggleButton, false);

    var slideIconDiv = document.createElement('div');
    slideIconDiv.setAttribute('id', 'metype-feed-slide-icon');
    slideIconDiv.setAttribute('class', 'metype-feed-slide-icon');
    slideIconDiv.addEventListener('click', slideToggle, false);


    elemDiv.appendChild(clickThruDiv);
    elemDiv.appendChild(slideIconDiv);

    document.body.appendChild(elemDiv);


    talktype(function() {
      talktype.feedWidgetIframe(elemDiv);
    });
  }
})();



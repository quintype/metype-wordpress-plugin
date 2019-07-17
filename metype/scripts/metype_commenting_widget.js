var metypeContainer = document.getElementById("metype-container"),
    page_url = metypeContainer.getAttribute("data-metype-page-url")
    metypeContainer.setAttribute('data-metype-page-url', page_url || window.location.href)
    metypeContainer.setAttribute('data-metype-window-height', window.innerHeight)
    metypeContainer.setAttribute('data-metype-screen-width', window.screen.width)

talktype(function() {
  talktype.commentWidgetIframe(metypeContainer);
});

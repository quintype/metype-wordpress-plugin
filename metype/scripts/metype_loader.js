window.talktype = window.talktype || function(f) {
  if(talktype.loaded)
    f();
  else
    (talktype.q=talktype.q||[]).push(arguments);
}

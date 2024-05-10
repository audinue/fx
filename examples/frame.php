<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Frame');
  if (fx_button('hello_world.html')) {
    fx_set_state('url', 'hello_world.html');
  }
  if (fx_button('hello_dude.html')) {
    fx_set_state('url', 'hello_dude.html');
  }
  fx_frame(fx_state('url', 'hello_world.html'));
}

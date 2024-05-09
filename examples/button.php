<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Button');
  fx_plain_text('if (fx_button(\'Click Me\')) {
  fx_set_state(\'clicked\', true);
}
if (fx_state(\'clicked\')) {
  fx_text(\'You have clicked the button\');
}');
  if (fx_button('Click Me')) {
    fx_set_state('clicked', true);
  }
  if (fx_state('clicked')) {
    fx_text('You have clicked the button');
  }
}

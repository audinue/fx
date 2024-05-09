<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Same Line');
  fx_plain_text('fx_button(\'Button 1\');
fx_button(\'Button 2\');
fx_same_line();');
  fx_button('Button 1');
  fx_button('Button 2');
  fx_same_line();
}

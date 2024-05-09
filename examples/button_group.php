<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Button Group');
  fx_plain_text('$clicked = fx_button_group([\'Button 1\', \'Button 2\', \'Button 3\']);
if ($clicked) {
  fx_set_state(\'clicked\', $clicked);
}
fx_text(\'Clicked: \' . fx_state(\'clicked\'));');
  $clicked = fx_button_group(['Button 1', 'Button 2', 'Button 3']);
  if ($clicked) {
    fx_set_state('clicked', $clicked);
  }
  fx_text('Clicked: ' . fx_state('clicked'));
}

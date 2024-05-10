<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Dialog');
  fx_plain_text('if (fx_state(\'show_dialog\')) {
  fx_begin_dialog();
  fx_text(\'Dialog content here.\');
  if (fx_button(\'Close Dialog\')) {
    fx_set_state(\'show_dialog\', false);
    fx_pop_state();
  }
  fx_end_dialog();
}
if (fx_button(\'Show Dialog\')) {
  fx_set_state(\'show_dialog\', true);
  fx_push_state();
}');
  if (fx_state('show_dialog')) {
    fx_begin_dialog();
    fx_text('Dialog content here.');
    if (fx_button('Close Dialog')) {
      fx_set_state('show_dialog', false);
      fx_pop_state();
    }
    fx_end_dialog();
  }
  if (fx_button('Show Dialog')) {
    fx_set_state('show_dialog', true);
    fx_push_state();
  }
}

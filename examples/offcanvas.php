<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Offcanvas');
  fx_plain_text('if (fx_state(\'show_offcanvas\')) {
  fx_begin_offcanvas();
  fx_text(\'Offcanvas content here.\');
  if (fx_button(\'Close Offcanvas\')) {
    fx_set_state(\'show_offcanvas\', false);
  }
  fx_end_offcanvas();
}
if (fx_button(\'Show Offcanvas\')) {
  fx_set_state(\'show_offcanvas\', true);
}');
  if (fx_state('show_offcanvas')) {
    fx_begin_offcanvas();
    fx_text('Offcanvas content here.');
    if (fx_button('Close Offcanvas')) {
      fx_set_state('show_offcanvas', false);
    }
    fx_end_offcanvas();
  }
  if (fx_button('Show Offcanvas')) {
    fx_set_state('show_offcanvas', true);
  }
}

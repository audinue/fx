<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Text List');
  fx_plain_text('$selected = fx_text_list(\'fruits\', [\'Apple\', \'Banana\', \'Cherry\']);
if ($selected) {
  fx_set_state(\'selected\', $selected);
}
fx_text(\'Selected: \' . fx_state(\'selected\'));');
  $selected = fx_text_list('fruits', ['Apple', 'Banana', 'Cherry']);
  if ($selected) {
    fx_set_state('selected', $selected);
  }
  fx_text('Selected: ' . fx_state('selected'));
}

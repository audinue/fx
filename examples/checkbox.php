<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Checkbox');
  fx_plain_text('$agree = fx_checkbox(\'Agree\');
fx_text(\'Agree: \' . ($agree ? \'yes\' : \'no\'));');
  $agree = fx_checkbox('Agree');
  fx_text('Agree: ' . ($agree ? 'yes' : 'no'));
}

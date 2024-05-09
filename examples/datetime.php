<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Datetime');
  fx_plain_text('$datetime = fx_datetime(\'Datetime\');
fx_text(\'Datetime: \' . $datetime);');
  $datetime = fx_datetime('Datetime');
  fx_text('Datetime: ' . $datetime);
}

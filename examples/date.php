<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Date');
  fx_plain_text('$date = fx_date(\'Date\');
fx_text(\'Date: \' . $date);');
  $date = fx_date('Date');
  fx_text('Date: ' . $date);
}

<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Month');
  fx_plain_text('$month = fx_month(\'Month\');
fx_text(\'Month: \' . $month);');
  $month = fx_month('Month');
  fx_text('Month: ' . $month);
}

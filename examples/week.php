<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Week');
  fx_plain_text('$week = fx_week(\'Week\');
fx_text(\'Week: \' . $week);');
  $week = fx_week('Week');
  fx_text('Week: ' . $week);
}

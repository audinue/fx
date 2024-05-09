<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Time');
  fx_plain_text('$time = fx_time(\'Time\');
fx_text(\'Time: \' . $time);');
  $time = fx_time('Time');
  fx_text('Time: ' . $time);
}

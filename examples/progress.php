<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Progress');
  fx_plain_text('fx_progress();
fx_progress(0.7);');
  fx_progress();
  fx_progress(0.7);
}

<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Video');
  fx_plain_text('fx_video(\'cat.webm\');');
  fx_video('cat.webm');
}

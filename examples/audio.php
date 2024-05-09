<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Audio');
  fx_plain_text('fx_audio(\'cat.mp3\');');
  fx_audio('cat.mp3');
}

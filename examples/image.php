<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Image');
  fx_plain_text('fx_image(\'cat.jpg\');');
  fx_image('cat.jpg');
}

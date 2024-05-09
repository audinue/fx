<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Color');
  fx_plain_text('$color = fx_color(\'Color\');
fx_text(\'Color: \' . $color);');
  $color = fx_color('Color');
  fx_text('Color: ' . $color);
}

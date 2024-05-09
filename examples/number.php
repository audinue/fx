<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Number');
  fx_plain_text('$number = fx_number(\'Number\');
fx_text(\'Number: \' . $number);');
  $number = fx_number('Number');
  fx_text('Number: ' . $number);
}

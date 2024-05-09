<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Radio Group');
  fx_plain_text('$fruit = fx_radio_group(\'Fruit\', [\'Apple\', \'Banana\', \'Cherry\']);
fx_text(\'Fruit: \' . $fruit);');
  $fruit = fx_radio_group('Fruit', ['Apple', 'Banana', 'Cherry']);
  fx_text('Fruit: ' . $fruit);
}

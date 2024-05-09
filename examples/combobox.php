<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Combobox');
  fx_plain_text('$fruit = fx_combobox(\'Fruit\', [\'Apple\', \'Banana\', \'Cherry\']);
fx_text(\'Fruit: \' . $fruit);');
  $fruit = fx_combobox('Fruit', ['Apple', 'Banana', 'Cherry']);
  fx_text('Fruit: ' . $fruit);
}

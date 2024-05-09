<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Listbox');
  fx_plain_text('$fruits = fx_listbox(\'Fruits\', [\'Apple\', \'Banana\', \'Cherry\']);
fx_text(\'Fruits: \' . implode(\', \', $fruits));');
  $fruits = fx_listbox('Fruits', ['Apple', 'Banana', 'Cherry']);
  fx_text('Fruits: ' . implode(', ', $fruits));
}

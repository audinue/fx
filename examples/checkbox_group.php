<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Checkbox Group');
  fx_plain_text('$fruits = fx_checkbox_group(\'Fruits\', [\'Apple\', \'Banana\', \'Cherry\']);
fx_text(\'Fruits: \' . implode(\', \', $fruits));');
  $fruits = fx_checkbox_group('Fruits', ['Apple', 'Banana', 'Cherry']);
  fx_text('Fruits: ' . implode(', ', $fruits));
}

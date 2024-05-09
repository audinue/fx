<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Table');
  fx_plain_text('fx_table([
  (object) [\'Name\' => \'Apple\', \'Price\' => 1],
  (object) [\'Name\' => \'Banana\', \'Price\' => 2],
  (object) [\'Name\' => \'Cherry\', \'Price\' => 3],
]);');
  fx_table([
    (object) ['Name' => 'Apple', 'Price' => 1],
    (object) ['Name' => 'Banana', 'Price' => 2],
    (object) ['Name' => 'Cherry', 'Price' => 3],
  ]);
}

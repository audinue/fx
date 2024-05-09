<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Data Grid');
  fx_plain_text('$fruits = fx_data_grid(
  [\'Name\', \'Price\'],
  [
    (object) [\'Name\' => \'Apple\',  \'Price\' => 4],
    (object) [\'Name\' => \'Banana\', \'Price\' => 3],
    (object) [\'Name\' => \'Cherry\', \'Price\' => 2],
    (object) [\'Name\' => \'Durian\', \'Price\' => 1],
  ]
);
fx_dump($fruits);');
  $fruits = fx_data_grid(
    ['Name', 'Price'],
    [
      (object) ['Name' => 'Apple',  'Price' => 4],
      (object) ['Name' => 'Banana', 'Price' => 3],
      (object) ['Name' => 'Cherry', 'Price' => 2],
      (object) ['Name' => 'Durian', 'Price' => 1],
    ]
  );
  fx_dump($fruits);
}

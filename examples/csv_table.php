<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('CSV Table');
  fx_plain_text('fx_csv_table([
  [\'Name\', \'Price\'],
  [\'Apple\', 1],
  [\'Banana\', 2],
  [\'Cherry\', 3],
]);');
  fx_csv_table([
    ['Name', 'Price'],
    ['Apple', 1],
    ['Banana', 2],
    ['Cherry', 3],
  ]);
}

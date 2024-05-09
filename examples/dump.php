<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Dump');
  fx_plain_text('fx_dump([\'message\' => \'Hello world!\']);');
  fx_dump(['message' => 'Hello world!']);
}

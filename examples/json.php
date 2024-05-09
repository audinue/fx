<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('JSON');
  fx_plain_text('fx_json([\'message\' => \'Hello world!\']);');
  fx_json(['message' => 'Hello world!']);
}

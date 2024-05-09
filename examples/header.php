<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Header');
  fx_plain_text('fx_header(\'Hello World\');');
  fx_header('Hello World');
}

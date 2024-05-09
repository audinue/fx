<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Text');
  fx_plain_text('fx_text(\'Hello world!\');');
  fx_text('Hello world!');
}

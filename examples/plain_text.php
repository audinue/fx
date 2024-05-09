<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Plain Text');
  fx_plain_text('fx_plain_text(\'Hello world!\');');
  fx_plain_text('Hello world!');
}

<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Emit');
  fx_plain_text('fx_emit(\'Hello world!\');');
  fx_emit('Hello world!');
}

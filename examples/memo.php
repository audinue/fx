<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Memo');
  fx_plain_text('$message = fx_memo(\'Message\');
fx_plain_text($message);');
  $message = fx_memo('Message');
  fx_plain_text($message);
}

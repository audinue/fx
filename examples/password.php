<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Password');
  fx_plain_text('$password = fx_password(\'Password\');
fx_text(\'Password: \' . $password);');
  $password = fx_password('Password');
  fx_text('Password: ' . $password);
}

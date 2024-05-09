<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Form');
  fx_plain_text('fx_begin_form();
$username = fx_textbox(\'Username\');
$password = fx_password(\'Password\');
if (fx_button(\'Login\')) {
  if ($username == \'admin\' && $password == \'admin\') {
    fx_set_state(\'message\', \'Login success.\');
  } else {
    fx_set_state(\'message\', \'Invalid username or password.\');
  }
}
fx_end_form();
fx_text(fx_state(\'message\'));');
  fx_begin_form();
  $username = fx_textbox('Username');
  $password = fx_password('Password');
  if (fx_button('Login')) {
    if ($username == 'admin' && $password == 'admin') {
      fx_set_state('message', 'Login success.');
    } else {
      fx_set_state('message', 'Invalid username or password.');
    }
  }
  fx_end_form();
  fx_text(fx_state('message'));
}

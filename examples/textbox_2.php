<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Textbox');
  fx_plain_text('fx_set_state(
  \'name\',
  fx_textbox_s(\'Name\', fx_state(\'name\', \'John\'))
);
fx_text(\'Hello \' . fx_state(\'name\') . \'!\');');
  fx_set_state(
    'name',
    fx_textbox_s('Name', fx_state('name', 'John'))
  );
  fx_text('Hello ' . fx_state('name') . '!');
}

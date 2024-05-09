<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Textbox');
  fx_plain_text('$name = fx_textbox(\'Name\', \'John\');
fx_text(\'Hello \' . $name . \'!\');');
  $name = fx_textbox('Name', 'John');
  fx_text('Hello ' . $name . '!');
}

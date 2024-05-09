<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('State');
  fx_plain_text('fx_set_state(\'foo\', \'bar\');
fx_text(\'foo = \' . fx_state(\'foo\'));

if (fx_no_state(\'baz\')) {
  fx_set_state(\'baz\', \'qux\');
}
fx_text(\'baz = \' . fx_get_state(\'baz\'));');
  fx_set_state('foo', 'bar');
  fx_text('foo = ' . fx_state('foo'));
  
  if (fx_no_state('baz')) {
    fx_set_state('baz', 'qux');
  }
  fx_text('baz = ' . fx_get_state('baz'));
}

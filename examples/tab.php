<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Tab');
  fx_plain_text('$page = fx_begin_tab([\'Page 1\', \'Page 2\', \'Page 3\'], \'Page 2\');
switch ($page) {
  case \'Page 1\':
    fx_text(\'Page 1 content here.\');
    break;
  case \'Page 2\':
    fx_text(\'Page 2 content here.\');
    break;
  case \'Page 3\':
    fx_text(\'Page 3 content here.\');
    break;
}
fx_end_tab();');
  $page = fx_begin_tab(['Page 1', 'Page 2', 'Page 3'], 'Page 2');
  switch ($page) {
    case 'Page 1':
      fx_text('Page 1 content here.');
      break;
    case 'Page 2':
      fx_text('Page 2 content here.');
      break;
    case 'Page 3':
      fx_text('Page 3 content here.');
      break;
  }
  fx_end_tab();
}

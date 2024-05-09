<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Grid');
  fx_plain_text('fx_begin_row();

fx_begin_column();
fx_text(\'Column 1\');
fx_end_column();

fx_begin_column();
fx_text(\'Column 2\');
fx_end_column();

fx_begin_column();
fx_text(\'Column 3\');
fx_end_column();

fx_end_row();');
  fx_begin_row();
  
  fx_begin_column();
  fx_text('Column 1');
  fx_end_column();
  
  fx_begin_column();
  fx_text('Column 2');
  fx_end_column();
  
  fx_begin_column();
  fx_text('Column 3');
  fx_end_column();
  
  fx_end_row();
}

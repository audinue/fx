<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('HTML');
  fx_plain_text('fx_html(\'Hello <b>world</b>!\');');
  fx_html('Hello <b>world</b>!');
}

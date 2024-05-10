<?php

function fx_dump($value)
{
  ob_start();
  var_dump($value);
  fx_plain_text(ob_get_clean());
}

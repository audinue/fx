<?php

function fx_header($value)
{
  fx_emit('<h3>' . htmlspecialchars($value) . '</h3>');
}

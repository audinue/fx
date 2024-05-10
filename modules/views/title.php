<?php

function fx_title($value)
{
  fx_emit('<h1>' . htmlspecialchars($value) . '</h1>');
}

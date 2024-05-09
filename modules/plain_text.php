<?php

function fx_plain_text($value)
{
  fx_emit('<pre>' . htmlspecialchars($value) . '</pre>');
}

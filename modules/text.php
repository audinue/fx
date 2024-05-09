<?php

function fx_text($value)
{
  fx_emit('<div>' . htmlspecialchars($value ?? '') . '</div>');
}

<?php

function fx_same_line(int $count = 2): void
{
  global $fx_buffer;
  $fx_buffer[] = '<div class="fx-same-line">' . implode('', array_splice($fx_buffer, count($fx_buffer) - $count)) . '</div>';
}

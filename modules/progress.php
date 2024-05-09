<?php

function fx_progress(?float $value = null): void
{
  if (is_null($value)) {
    fx_emit('<progress></progress>');
  } else {
    fx_emit('<progress value="' . $value . '"></progress>');
  }
}

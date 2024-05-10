<?php

function fx_json($value)
{
  fx_plain_text(
    str_replace(
      '    ',
      '  ',
      json_encode($value, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
    )
  );
}

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width" />
  <style>
    <?php
    foreach (glob(__DIR__ . '/*.css') as $file) {
      echo minify(file_get_contents($file));
    }
    ?>
  </style>
  <script id="fx-state" type="text/plain"><?= json_encode($fx_state) ?></script>
  <script>
    <?php
    foreach (glob(__DIR__ . '/*.js') as $file) {
      echo minify(file_get_contents($file));
    }
    ?>
  </script>
</head>

<body><?= implode('', $fx_buffer) ?></body>

</html>
<?php

function minify($code)
{
  $code = preg_replace('@(\W)[\r\n]+(\W)@', '$1$2', $code);
  $code = preg_replace('@(\w)[\s]+(\W)@', '$1$2', $code);
  $code = preg_replace('@(\W)[\s]+(\w)@', '$1$2', $code);
  $code = preg_replace('@(\W)[\s]+(\W)@', '$1$2', $code);
  return $code;
}

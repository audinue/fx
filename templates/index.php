<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width" />
  <style>
    <?php
    foreach (glob(__DIR__ . '/*.css') as $file) {
      require $file;
    }
    ?>
  </style>
  <script id="fx-state" type="text/plain"><?= json_encode($fx_state) ?></script>
  <script>
    <?php
    foreach (glob(__DIR__ . '/*.js') as $file) {
      require $file;
    }
    ?>
  </script>
</head>

<body><?= implode('', $fx_buffer) ?></body>

</html>
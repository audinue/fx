<?php

$files = new RecursiveDirectoryIterator(__DIR__ . '/modules');
$files = new RecursiveIteratorIterator($files);

foreach ($files as $file) {
  if (is_file($file)) {
    require $file;
  }
}

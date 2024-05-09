<?php

$md = file_get_contents(__DIR__ . '/../REFERENCE.md');

preg_match_all('@(###[^\n]+)|(```php.+?```)@s', $md, $matches);

assert(count($matches[1]) == count($matches[2]));

$names = [];

foreach ($matches[1] as $key => $value) {
  if (!empty($value)) {
    $name = trim($value);
    $name = preg_replace('@###\s*(.+)@', '$1', $name);
    $title = $name;
    $name = preg_replace('@\s+@', '_', $name);
    $name = strtolower($name);
    $count = 0;
  } else {
    $count++;
    if ($count > 1) {
      $name_counted = $name . '_' . $count;
    } else {
      $name_counted = $name;
    }
    $file = __DIR__ . '/../examples/' . $name_counted . '.php';
    $code = $matches[2][$key];
    $code = preg_replace('@^```php|```$@', '', $code);
    $code = trim($code);
    $quoted_code = addslashes($code);
    $indented_code = preg_replace('@^@m', '  ', $code);
    $indented_code = <<<PHP
<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('$title');
  fx_plain_text('$quoted_code');
$indented_code
}

PHP;
    file_put_contents($file, $indented_code);
  }
}

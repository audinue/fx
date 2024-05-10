# fx

Simple UI for simple people.

```php
require '/path/to/fx.php';

function fx_main() {
  fx_title('Simple Counter');
  if (fx_button(fx_state('count', 0))) {
    fx_add_state('count', 1);
  }
}
```

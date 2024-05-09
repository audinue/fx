# FX Reference

## State

### State

- `fx_get_state(string $key): mixed`
- `fx_set_state(string $key, mixed $value): mixed`
- `fx_no_state(string $key): bool`
- `fx_state(string $key, mixed $default_value = NULL): mixed`

```php
fx_set_state('foo', 'bar');
fx_text('foo = ' . fx_state('foo'));

if (fx_no_state('baz')) {
  fx_set_state('baz', 'qux');
}
fx_text('baz = ' . fx_get_state('baz'));
```

## Controls

- `$label` is treated as an ID.

### Title

- `fx_title(mixed $value): void`

```php
fx_title('Hello World');
```

### Header

- `fx_header(mixed $value): void`

```php
fx_header('Hello World');
```

### Text

- `fx_text(mixed $value): void`

```php
fx_text('Hello world!');
```

### Plain Text

- `fx_plain_text(mixed $value): void`

```php
fx_plain_text('Hello world!');
```

### HTML

- `fx_html(mixed $value): void`

```php
fx_html('Hello <b>world</b>!');
```

### JSON

- `fx_json(mixed $value): void`

```php
fx_json(['message' => 'Hello world!']);
```

### Dump

- `fx_dump(mixed $value): void`

```php
fx_dump(['message' => 'Hello world!']);
```

### Image

- `fx_image(string $url): void`

```php
fx_image('cat.jpg');
```

### Audio

- `fx_audio(string $url): void`

```php
fx_audio('cat.mp3');
```

### Video

- `fx_video(string $url): void`

```php
fx_video('cat.webm');
```

### Table

- `fx_table(array $array): void`

```php
fx_table([
  (object) ['Name' => 'Apple', 'Price' => 1],
  (object) ['Name' => 'Banana', 'Price' => 2],
  (object) ['Name' => 'Cherry', 'Price' => 3],
]);
```

```php
// Empty table
fx_table([]);
```

### CSV Table

- `fx_csv_table(array $array): void`

```php
fx_csv_table([
  ['Name', 'Price'],
  ['Apple', 1],
  ['Banana', 2],
  ['Cherry', 3],
]);
```

### Button

- `fx_button(string $label): bool`

```php
if (fx_button('Click Me')) {
  fx_set_state('clicked', true);
}
if (fx_state('clicked')) {
  fx_text('You have clicked the button');
}
```

### Text Button

- `fx_text_button(string $label): bool`

```php
if (fx_text_button('Click Me')) {
  fx_set_state('clicked', true);
}
if (fx_state('clicked')) {
  fx_text('You have clicked the text button');
}
```

### Button Group

- `fx_button_group(array $buttons): ?string`
- `$buttons` is treated as an ID.

```php
$clicked = fx_button_group(['Button 1', 'Button 2', 'Button 3']);
if ($clicked) {
  fx_set_state('clicked', $clicked);
}
fx_text('Clicked: ' . fx_state('clicked'));
```

### Textbox

- `fx_textbox(string $label, string $initial_value = ''): string`

```php
$name = fx_textbox('Name', 'John');
fx_text('Hello ' . $name . '!');
```

- `fx_textbox_s(string $label, string $value): string`

```php
fx_set_state(
  'name',
  fx_textbox_s('Name', fx_state('name', 'John'))
);
fx_text('Hello ' . fx_state('name') . '!');
```

### Password

- `fx_password(string $label, string $initial_value = ''): string`
- `fx_password_s(string $label, string $value): string`

```php
$password = fx_password('Password');
fx_text('Password: ' . $password);
```

### Number

- `fx_number(string $label, int $initial_value = 0): int`
- `fx_number_s(string $label, int $value): int`

```php
$number = fx_number('Number');
fx_text('Number: ' . $number);
```

### Date

- `fx_date(string $label, int $initial_value = 0): int`
- `fx_date_s(string $label, int $value): int`

```php
$date = fx_date('Date');
fx_text('Date: ' . $date);
```

### Time

- `fx_time(string $label, int $initial_value = 0): int`
- `fx_time_s(string $label, int $value): int`

```php
$time = fx_time('Time');
fx_text('Time: ' . $time);
```

### Datetime

- `fx_datetime(string $label, int $initial_value = 0): int`
- `fx_datetime_s(string $label, int $value): int`

```php
$datetime = fx_datetime('Datetime');
fx_text('Datetime: ' . $datetime);
```

### Week

- `fx_week(string $label, int $initial_value = 0): int`
- `fx_week_s(string $label, int $value): int`

```php
$week = fx_week('Week');
fx_text('Week: ' . $week);
```

### Month

- `fx_month(string $label, int $initial_value = 0): int`
- `fx_month_s(string $label, int $value): int`

```php
$month = fx_month('Month');
fx_text('Month: ' . $month);
```

### Color

- `fx_color(string $label, int $initial_value = 0): int`
- `fx_color_s(string $label, int $value): int`

```php
$color = fx_color('Color');
fx_text('Color: ' . $color);
```

### Progress

- `fx_progress(?number $value = null): void`

```php
fx_progress();
fx_progress(0.7);
```

### Memo

- `fx_memo(string $label, string $initial_value = ''): string`
- `fx_memo_s(string $label, string $value): string`

```php
$message = fx_memo('Message');
fx_plain_text($message);
```

### Checkbox

- `fx_checkbox(string $label, bool $initial_checked = false): bool`
- `fx_checkbox_s(string $label, bool $checked): bool`

```php
$agree = fx_checkbox('Agree');
fx_text('Agree: ' . ($agree ? 'yes' : 'no'));
```

### Combobox

- `fx_combobox(string $label, array $options, string $initial_selected = ''): string`
- `fx_combobox_s(string $label, array $options, string $selected): string`

```php
$fruit = fx_combobox('Fruit', ['Apple', 'Banana', 'Cherry']);
fx_text('Fruit: ' . $fruit);
```

### Listbox

- `fx_listbox(string $label, array $options, array $initial_selected = []): array`
- `fx_listbox_s(string $label, array $options, array $selected): array`

```php
$fruits = fx_listbox('Fruits', ['Apple', 'Banana', 'Cherry']);
fx_text('Fruits: ' . implode(', ', $fruits));
```

### Radio Group

- `fx_radio_group(string $label, array $options, string $initial_selected = ''): string`
- `fx_radio_group_s(string $label, array $options, string $selected): string`

```php
$fruit = fx_radio_group('Fruit', ['Apple', 'Banana', 'Cherry']);
fx_text('Fruit: ' . $fruit);
```

### Checkbox Group

- `fx_checkbox_group(string $label, array $options, array $initial_selected = []): array`
- `fx_checkbox_group_s(string $label, array $options, array $selected): array`

```php
$fruits = fx_checkbox_group('Fruits', ['Apple', 'Banana', 'Cherry']);
fx_text('Fruits: ' . implode(', ', $fruits));
```

### Same Line

- `fx_same_line(int $count = 2): void`

```php
fx_button('Button 1');
fx_button('Button 2');
fx_same_line();
```

### Grid

- `fx_begin_row()`
- `fx_end_row()`
- `fx_begin_column()`
- `fx_end_column()`

```php
fx_begin_row();

fx_begin_column();
fx_text('Column 1');
fx_end_column();

fx_begin_column();
fx_text('Column 2');
fx_end_column();

fx_begin_column();
fx_text('Column 3');
fx_end_column();

fx_end_row();
```

### Tab

- `fx_begin_tab(array $pages, string $initial_selected = ''): string`
- `fx_begin_tab_s(array $pages, string $selected): string`
- `$pages` is treated as an ID.

```php
$page = fx_begin_tab(['Page 1', 'Page 2', 'Page 3'], 'Page 2');
switch ($page) {
  case 'Page 1':
    fx_text('Page 1 content here.');
    break;
  case 'Page 2':
    fx_text('Page 2 content here.');
    break;
  case 'Page 3':
    fx_text('Page 3 content here.');
    break;
}
fx_end_tab();
```

### Dialog

- `fx_begin_dialog(): void`
- `fx_end_dialog(): void`

```php
if (fx_state('show_dialog')) {
  fx_begin_dialog();
  fx_text('Dialog content here.');
  if (fx_button('Close Dialog')) {
    fx_set_state('show_dialog', false);
    fx_pop_state();
  }
  fx_end_dialog();
}
if (fx_button('Show Dialog')) {
  fx_set_state('show_dialog', true);
  fx_push_state();
}
```

### Form

- `fx_begin_form(): void`
- `fx_end_form(): void`

```php
fx_begin_form();
$username = fx_textbox('Username');
$password = fx_password('Password');
if (fx_button('Login')) {
  if ($username == 'admin' && $password == 'admin') {
    fx_set_state('message', 'Login success.');
  } else {
    fx_set_state('message', 'Invalid username or password.');
  }
}
fx_end_form();
fx_text(fx_state('message'));
```

### Data Grid

- `fx_data_grid(array $columns, array $initial_rows = []): array`
- `fx_data_grid_s(array $columns, array $rows): array`
- `$columns` is treated as an ID.

```php
$fruits = fx_data_grid(
  ['Name', 'Price'],
  [
    (object) ['Name' => 'Apple',  'Price' => 4],
    (object) ['Name' => 'Banana', 'Price' => 3],
    (object) ['Name' => 'Cherry', 'Price' => 2],
    (object) ['Name' => 'Durian', 'Price' => 1],
  ]
);
fx_dump($fruits);
```

### Offcanvas

- `fx_begin_offcanvas()`
- `fx_end_offcanvas()`

```php
if (fx_state('show_offcanvas')) {
  fx_begin_offcanvas();
  fx_text('Offcanvas content here.');
  if (fx_button('Close Offcanvas')) {
    fx_set_state('show_offcanvas', false);
  }
  fx_end_offcanvas();
}
if (fx_button('Show Offcanvas')) {
  fx_set_state('show_offcanvas', true);
}
```

### Text List

- `fx_text_list(string $name, $items): ?string`

```php
$selected = fx_text_list('fruits', ['Apple', 'Banana', 'Cherry']);
if ($selected) {
  fx_set_state('selected', $selected);
}
fx_text('Selected: ' . fx_state('selected'));
```

## Low Level

### Event

- `fx_event()`
- `fx_change(string $target): bool`
- `fx_click(string $target): bool`

```php
$count = fx_state('count', 0);
$text = fx_state('text', '');

fx_emit(<<<HTML
  <button data-target="My Button">$count</button>
  <input data-target="My Text Box">
  <p>Count: $count</p>
  <p>Text: $text</p>
HTML);

if (fx_event()->type == 'click' && fx_event()->target == 'My Button') {
  fx_set_state('count', fx_state('count') + 1);
}
if (fx_event()->type == 'change' && fx_event()->target == 'My Text Box') {
  fx_set_state('text', fx_event()->value);
}
```

### Emit

- `fx_emit(mixed $content): void`

```php
fx_emit('Hello world!');
```

### Commands

- `fx_send(array $command): void`
- `fx_push_state(): void`
- `fx_pop_state(): void`
- `fx_focus(string $target, string $id, string $tag): void`

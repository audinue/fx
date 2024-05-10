<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('List View');
  fx_plain_text('$selected = fx_list_view(\'fruits\', [
  (object) [\'image\' => \'apple.jpg\', \'title\' => \'Apple\', \'subtitle\' => \'A red fruit\'],
  (object) [\'image\' => \'banana.jpg\', \'title\' => \'Banana\', \'subtitle\' => \'A yellow fruit\'],
  (object) [\'image\' => \'cherry.jpg\', \'title\' => \'Cherry\', \'subtitle\' => \'Another red fruit\'],
]);
if ($selected) {
  fx_set_state(\'selected\', $selected);
}
fx_text(\'Selected:\');
fx_dump(fx_state(\'selected\'));
fx_same_line();');
  $selected = fx_list_view('fruits', [
    (object) ['image' => 'apple.jpg', 'title' => 'Apple', 'subtitle' => 'A red fruit'],
    (object) ['image' => 'banana.jpg', 'title' => 'Banana', 'subtitle' => 'A yellow fruit'],
    (object) ['image' => 'cherry.jpg', 'title' => 'Cherry', 'subtitle' => 'Another red fruit'],
  ]);
  if ($selected) {
    fx_set_state('selected', $selected);
  }
  fx_text('Selected:');
  fx_dump(fx_state('selected'));
  fx_same_line();
}

<?php

require __DIR__ . '/../fx.php';

function fx_main()
{
  fx_title('Event');
  fx_plain_text('$count = fx_state(\'count\', 0);
$text = fx_state(\'text\', \'\');

fx_emit(<<<HTML
  <button data-target=\"My Button\">$count</button>
  <input data-target=\"My Text Box\">
  <p>Count: $count</p>
  <p>Text: $text</p>
HTML);

if (fx_event()->type == \'click\' && fx_event()->target == \'My Button\') {
  fx_set_state(\'count\', fx_state(\'count\') + 1);
}
if (fx_event()->type == \'change\' && fx_event()->target == \'My Text Box\') {
  fx_set_state(\'text\', fx_event()->value);
}');
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
}

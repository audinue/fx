<?php

function fx_memo_s($label, $value)
{
  $label_html = htmlspecialchars($label);
  $value_html = htmlspecialchars($value);
  fx_emit('<label>' . $label_html . '<textarea data-target="' . $label_html . '">' . $value_html . '</textarea></label>');
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->value;
  } else {
    return $value;
  }
}

function fx_memo($label, $initial_value = '')
{
  return fx_set_state(
    $label,
    fx_memo_s(
      $label,
      fx_state($label, $initial_value)
    )
  );
}

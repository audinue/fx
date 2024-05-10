<?php

function fx_checkbox_s($label, $checked)
{
  $label_html = htmlspecialchars($label);
  fx_emit('<label><input type="checkbox" data-target="' . $label_html . '"' . ($checked ? ' checked' : '') . '>' . $label_html . '</label>');
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->checked;
  } else {
    return $checked;
  }
}

function fx_checkbox($label, $initial_checked = false)
{
  return fx_set_state(
    $label,
    fx_checkbox_s(
      $label,
      fx_state($label, $initial_checked)
    )
  );
}

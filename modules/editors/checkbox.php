<?php

function fx_checkbox_s(string $label, bool $checked): bool
{
  $label_html = htmlspecialchars($label);
  fx_emit('<label><input type="checkbox" data-target="' . $label_html . '"' . ($checked ? ' checked' : '') . '>' . $label_html . '</label>');
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->checked;
  } else {
    return $checked;
  }
}

function fx_checkbox(string $label, bool $initial_checked = false): bool
{
  return fx_set_state(
    $label,
    fx_checkbox_s(
      $label,
      fx_state($label, $initial_checked)
    )
  );
}

<?php

function fx_listbox_s(string $label, array $options, array $selected): array
{
  $label_html = htmlspecialchars($label);
  $html = '<label>';
  $html .= $label_html;
  $html .= '<select multiple data-target="' . $label_html . '">';
  foreach ($options as $option) {
    $html .= '<option' . (in_array($option, $selected) ? ' selected' : '') . '>';
    $html .= htmlspecialchars($option);
    $html .= '</option>';
  }
  $html .= '</select>';
  $html .= '</label>';
  fx_emit($html);
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->selected;
  } else {
    return $selected;
  }
}

function fx_listbox(string $label, array $options, array $initial_selected = []): array
{
  return fx_set_state(
    $label,
    fx_listbox_s(
      $label,
      $options,
      fx_state($label, $initial_selected)
    )
  );
}

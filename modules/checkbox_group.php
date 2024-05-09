<?php

function fx_checkbox_group_s(string $label, array $options, array $selected): array
{
  $label_html = htmlspecialchars($label);
  $html = '<fieldset data-target="' . $label_html . '">';
  $html .= '<legend>' . $label_html . '</legend>';
  foreach ($options as $option) {
    $option_html = htmlspecialchars($option);
    $html .= '<label>';
    $html .= '<input type="checkbox" value="' . $option_html . '"' . (in_array($option, $selected) ? ' checked' : '') . '>';
    $html .= $option_html;
    $html .= '</label>';
  }
  $html .= '</fieldset>';
  fx_emit($html);
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    if (fx_event()->checked) {
      return array_merge($selected, [fx_event()->value]);
    } else {
      return array_values(array_filter($selected, fn ($value) => $value != fx_event()->value));
    }
  } else {
    return $selected;
  }
}

function fx_checkbox_group(string $label, array $options, array $initial_selected = []): array
{
  return fx_set_state(
    $label,
    fx_checkbox_group_s(
      $label,
      $options,
      fx_state($label, $initial_selected)
    )
  );
}

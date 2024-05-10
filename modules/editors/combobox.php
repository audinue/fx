<?php

function fx_combobox_s($label, $options, $selected)
{
  $label_html = htmlspecialchars($label);
  $html = '<label>';
  $html .= $label_html;
  $html .= '<select data-target="' . $label_html . '">';
  $html .= '<option></option>';
  foreach ($options as $option) {
    $html .= '<option' . ($option == $selected ? ' selected' : '') . '>' . htmlspecialchars($option) . '</option>';
  }
  $html .= '</select>';
  $html .= '</label>';
  fx_emit($html);
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->value;
  } else {
    return $selected;
  }
}

function fx_combobox($label, $options, $initial_selected = '')
{
  return fx_set_state(
    $label,
    fx_combobox_s(
      $label,
      $options,
      fx_state($label, $initial_selected)
    )
  );
}

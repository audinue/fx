<?php

function fx_radio_group_s($label, $options, $selected)
{
  $label_html = htmlspecialchars($label);
  $html = '<fieldset data-target="' . $label_html . '">';
  $html .= '<legend>' . $label_html . '</legend>';
  foreach ($options as $option) {
    $option_html = htmlspecialchars($option);
    $html .= '<label>';
    $html .= '<input type="radio" name="' . $label_html . '" value="' . $option_html . '"' . ($option == $selected ? ' checked' : '') . '>';
    $html .= $option_html;
    $html .= '</label>';
  }
  $html .= '</fieldset>';
  fx_emit($html);
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->value;
  } else {
    return $selected;
  }
}

function fx_radio_group($label, $options, $initial_selected = '')
{
  return fx_set_state(
    $label,
    fx_radio_group_s(
      $label,
      $options,
      fx_state($label, $initial_selected)
    )
  );
}

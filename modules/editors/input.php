<?php

function fx_input_s($type, $label, $value)
{
  $label_html = htmlspecialchars($label);
  $value_html = htmlspecialchars($value);
  fx_emit('<label>' . $label_html . '<input type="' . $type . '" data-target="' . $label_html . '" value="' . $value_html . '"></label>');
  if (fx_event()->type == 'change' && fx_event()->target == $label) {
    return fx_event()->value;
  } else {
    return $value;
  }
}

function fx_input($type, $label, $initial_value)
{
  return fx_set_state(
    $label,
    fx_input_s(
      $type,
      $label,
      fx_state($label, $initial_value)
    )
  );
}

function fx_textbox_s($label, $value)
{
  return fx_input_s('text', $label, $value);
}

function fx_textbox($label, $initial_value = '')
{
  return fx_input('text', $label, $initial_value);
}

function fx_password_s($label, $value)
{
  return fx_input_s('password', $label, $value);
}

function fx_password($label, $initial_value = '')
{
  return fx_input('password', $label, $initial_value);
}

function fx_number_s($label, $value)
{
  return intval(fx_input_s('number', $label, $value));
}

function fx_number($label, $initial_value = '')
{
  return intval(fx_input('number', $label, $initial_value));
}

function fx_date_s($label, $value)
{
  return fx_input_s('date', $label, $value);
}

function fx_date($label, $initial_value = '')
{
  return fx_input('date', $label, $initial_value);
}

function fx_time_s($label, $value)
{
  return fx_input_s('time', $label, $value);
}

function fx_time($label, $initial_value = '')
{
  return fx_input('time', $label, $initial_value);
}

function fx_datetime_s($label, $value)
{
  return fx_input_s('datetime-local', $label, $value);
}

function fx_datetime($label, $initial_value = '')
{
  return fx_input('datetime-local', $label, $initial_value);
}

function fx_week_s($label, $value)
{
  return fx_input_s('week', $label, $value);
}

function fx_week($label, $initial_value = '')
{
  return fx_input('week', $label, $initial_value);
}

function fx_month_s($label, $value)
{
  return fx_input_s('month', $label, $value);
}

function fx_month($label, $initial_value = '')
{
  return fx_input('month', $label, $initial_value);
}

function fx_color_s($label, $value)
{
  return fx_input_s('color', $label, $value);
}

function fx_color($label, $initial_value = '#000000')
{
  return fx_input('color', $label, $initial_value);
}

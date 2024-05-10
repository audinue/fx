<?php

function _fx_input_s(string $type, string $label, string $value): string
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

function _fx_input(string $type, string $label, string $initial_value): string
{
  return fx_set_state(
    $label,
    _fx_input_s(
      $type,
      $label,
      fx_state($label, $initial_value)
    )
  );
}

function fx_textbox_s(string $label, string $value): string
{
  return _fx_input_s('text', $label, $value);
}

function fx_textbox(string $label, $initial_value = ''): string
{
  return _fx_input('text', $label, $initial_value);
}

function fx_password_s(string $label, string $value): string
{
  return _fx_input_s('password', $label, $value);
}

function fx_password(string $label, string $initial_value = ''): string
{
  return _fx_input('password', $label, $initial_value);
}

function fx_number_s(string $label, int $value): int
{
  return intval(_fx_input_s('number', $label, $value));
}

function fx_number(string $label, int $initial_value = 0): int
{
  return intval(_fx_input('number', $label, $initial_value));
}

function fx_date_s(string $label, string $value): string
{
  return _fx_input_s('date', $label, $value);
}

function fx_date(string $label, string $initial_value = ''): string
{
  return _fx_input('date', $label, $initial_value);
}

function fx_time_s(string $label, string $value): string
{
  return _fx_input_s('time', $label, $value);
}

function fx_time(string $label, string $initial_value = ''): string
{
  return _fx_input('time', $label, $initial_value);
}

function fx_datetime_s(string $label, string $value): string
{
  return _fx_input_s('datetime-local', $label, $value);
}

function fx_datetime(string $label, string $initial_value = ''): string
{
  return _fx_input('datetime-local', $label, $initial_value);
}

function fx_week_s(string $label, string $value): string
{
  return _fx_input_s('week', $label, $value);
}

function fx_week(string $label, string $initial_value = ''): string
{
  return _fx_input('week', $label, $initial_value);
}

function fx_month_s(string $label, string $value): string
{
  return _fx_input_s('month', $label, $value);
}

function fx_month(string $label, string $initial_value = ''): string
{
  return _fx_input('month', $label, $initial_value);
}

function fx_color_s(string $label, string $value): string
{
  return _fx_input_s('color', $label, $value);
}

function fx_color(string $label, string $initial_value = '#000000'): string
{
  return _fx_input('color', $label, $initial_value);
}

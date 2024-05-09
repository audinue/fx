<?php

function fx_get_state($key)
{
  global $fx_state;
  return $fx_state->$key;
}

function fx_set_state($key, $value)
{
  global $fx_state;
  return $fx_state->$key = $value;
}

function fx_no_state($key)
{
  global $fx_state;
  return !isset($fx_state->$key);
}

function fx_state($key, $default_value = null)
{
  global $fx_state;
  if (isset($fx_state->$key)) {
    return $fx_state->$key;
  } else {
    return $default_value;
  }
}

function fx_event()
{
  global $fx_event;
  return $fx_event;
}

function fx_emit($content)
{
  global $fx_buffer;
  $fx_buffer[] = $content;
}

function fx_send($command)
{
  global $fx_commands;
  $fx_commands[] = $command;
}

function fx_push_state()
{
  fx_send(['type' => 'push_state']);
}

function fx_pop_state()
{
  fx_send(['type' => 'pop_state']);
}

function fx_focus($target, $id = null, $tag = null)
{
  fx_send([
    'type' => 'focus',
    'target' => $target,
    'id' => $id,
    'tag' => $tag
  ]);
}

function _fx_shutdown()
{
  global $fx_state, $fx_event, $fx_commands, $fx_buffer;
  if (!is_callable('fx_main')) {
    return;
  }
  $null_event = (object) ['type' => null, 'target' => null];
  $is_post = $_SERVER['REQUEST_METHOD'] == 'POST';
  if ($is_post) {
    $meta = json_decode($_POST['meta']);
    $fx_event = $meta->event;
    $fx_state = $meta->state;
  } else {
    $fx_event = $null_event;
    $fx_state = new stdClass;
  }
  $fx_commands = [];
  $fx_buffer = [];
  fx_main();
  $fx_event = $null_event;
  $fx_buffer = [];
  fx_main();
  if ($is_post) {
    echo json_encode([
      'state' => $fx_state,
      'body' => implode('', $fx_buffer),
      'commands' => $fx_commands
    ]);
  } else {
    require __DIR__ . '/../templates/index.php';
  }
}

register_shutdown_function('_fx_shutdown');

<?php

function fx_get_state(string $key): mixed
{
  global $fx_state;
  return $fx_state->$key;
}

function fx_set_state(string $key, mixed $value): mixed
{
  global $fx_state;
  return $fx_state->$key = $value;
}

function fx_no_state(string $key): bool
{
  global $fx_state;
  return !isset($fx_state->$key);
}

function fx_state(string $key, mixed $default_value = null): mixed
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

function fx_emit(mixed $content): void
{
  global $fx_buffer;
  $fx_buffer[] = $content;
}

function fx_send(array $command): void
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

function fx_focus(string $target, ?string $id = null, ?string $tag = null): void
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

function _fx_snapshot()
{
  $snapshot = [];
  if (getcwd() == realpath(__DIR__ . '/../examples')) {
    $files = __DIR__ . '/../';
  } else {
    $files = getcwd();
  }
  $files = new RecursiveDirectoryIterator($files);
  $files = new RecursiveIteratorIterator($files);
  foreach ($files as $file) {
    if (!is_file($file)) {
      continue;
    }
    $snapshot[strval($file)] = filemtime($file);
  }
  return $snapshot;
}

if (isset($_GET['_fx_live_reload'])) {
  ob_end_flush();
  header('Content-Type: text/event-stream');
  $curr = _fx_snapshot();
  while (true) {
    $next = _fx_snapshot();
    if ($curr != $next) {
      $curr = $next;
      echo "data: reload\n\n";
    } else {
      echo "data: \n\n";
    }
    if (ob_get_level() > 0) {
      ob_flush();
    }
    flush();
    if (connection_aborted()) {
      break;
    }
    sleep(1);
  }
} else {
  register_shutdown_function('_fx_shutdown');
}

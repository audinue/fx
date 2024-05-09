<?php

function fx_table(array $array)
{
  if (empty($array)) {
    fx_emit('<p>No data.</p>');
  } else {
    $columns = array_keys((array) $array[0]);
    $html = '<table>';
    $html .= '<thead>';
    $html .= '<tr>';
    foreach ($columns as $column) {
      $html .= '<th>';
      $html .= htmlspecialchars($column);
      $html .= '</th>';
    }
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach ($array as $row) {
      $html .= '<tr>';
      foreach ($columns as $column) {
        $html .= '<td>';
        $html .= htmlspecialchars($row->$column);
        $html .= '</td>';
      }
      $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    fx_emit($html);
  }
}

<?php

function fx_csv_table(array $array)
{
  if (empty($array)) {
    fx_emit('<p>No data.</p>');
  } else {
    $columns = $array[0];
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
    foreach (array_slice($array, 1) as $row) {
      $html .= '<tr>';
      foreach ($columns as $index => $column) {
        $html .= '<td>';
        $html .= htmlspecialchars($row[$index]);
        $html .= '</td>';
      }
      $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
    fx_emit($html);
  }
}

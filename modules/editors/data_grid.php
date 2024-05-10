<?php

function _fx_data_grid_state()
{
  return (object) [
    'search' => '',
    'sort' => null,
    'page' => 1,
    'is_add' => false,
    'edit_index' => -1,
    'row' => null,
    'rows' => null,
  ];
}

function _fx_data_grid_reset_edit($state)
{
  $state->is_add = false;
  $state->edit_index = -1;
  $state->row = null;
}

function fx_data_grid_s(array $columns, array $rows): array
{
  $target = 'data_grid_' . implode('_', $columns);
  if (fx_no_state($target)) {
    fx_set_state($target, _fx_data_grid_state());
  }
  $state = fx_get_state($target);
  $filtered_rows = [];
  if ($state->search) {
    foreach ($rows as $row) {
      foreach ($columns as $column) {
        if (stripos($row->$column, $state->search) !== false) {
          $filtered_rows[] = $row;
        }
      }
    }
  } else {
    $filtered_rows = $rows;
  }
  $sorted_rows = $filtered_rows;
  if ($state->sort) {
    usort(
      $sorted_rows,
      fn ($a, $b) => $state->sort->order * strnatcasecmp($a->{$state->sort->column}, $b->{$state->sort->column})
    );
  }
  $row_count = count($sorted_rows);
  $page_size = 5;
  $page_count = max(1, ceil(count($sorted_rows) / $page_size));
  $paged_rows = array_slice($sorted_rows, ($state->page - 1) * $page_size, $page_size);
  $header_target = $target . '_header';
  $thead_target = $target . '_thead';
  $tbody_target = $target . '_tbody';
  $footer_target = $target . '_footer';
  $html = '<div class="fx-data-grid">';
  $html .= '<header data-target="' . htmlspecialchars($header_target) . '">';
  $html .= '<button data-id="add">Add</button>';
  $html .= '<br>';
  $html .= '<input data-id="search" type="search" value="' . htmlspecialchars($state->search) . '">';
  $html .= '</header>';
  $html .= '<div class="fx-table-container">';
  $html .= '<table>';
  $html .= '<thead data-target="' . htmlspecialchars($thead_target) . '">';
  $html .= '<tr>';
  foreach ($columns as $column) {
    $html .= '<th width="' . floor(100 / (count($columns) + 1)) . '%">';
    $html .= '<button class="fx-text-button" data-id="' . htmlspecialchars($column) . '">';
    $html .= htmlspecialchars($column);
    if ($state->sort) {
      if ($state->sort->column == $column) {
        if ($state->sort->order == 1) {
          $html .= ' &darr;';
        } else {
          $html .= ' &uarr;';
        }
      }
    }
    $html .= '</button>';
    $html .= '</th>';
  }
  $html .= '<th>Action</th>';
  $html .= '</tr>';
  $html .= '</thead>';
  $html .= '<tbody data-target="' . htmlspecialchars($tbody_target) . '">';
  if ($state->is_add) {
    $html .= '<tr>';
    foreach ($columns as $column) {
      $html .= '<td>';
      $html .= '<input data-id="' . htmlspecialchars($column) . '" value="' . htmlspecialchars($state->row->$column) . '">';
      $html .= '</td>';
    }
    $html .= '<td>';
    $html .= '<button data-id="save">Save</button>';
    $html .= '<button data-id="cancel">Cancel</button>';
    $html .= '</td>';
    $html .= '</tr>';
  }
  foreach ($paged_rows as $index => $row) {
    $html .= '<tr>';
    if ($index == $state->edit_index) {
      foreach ($columns as $index => $column) {
        $html .= '<td>';
        $html .= '<input data-id="' . htmlspecialchars($column) . '" value="' . htmlspecialchars($state->row->$column) . '">';
        $html .= '</td>';
      }
      $html .= '<td>';
      $html .= '<button data-id="save">Save</button>';
      $html .= '<button data-id="cancel">Cancel</button>';
      $html .= '</td>';
    } else {
      foreach ($columns as $column) {
        $html .= '<td>';
        $html .= htmlspecialchars($row->$column);
        $html .= '</td>';
      }
      $html .= '<td>';
      $html .= '<button data-id="edit" data-tag="' . $index . '">Edit</button>';
      $html .= '<button data-id="remove" data-tag="' . $index . '">Remove</button>';
      $html .= '</td>';
    }
    $html .= '</tr>';
  }
  for ($i = $page_size - count($paged_rows) - 1; $i > -1; $i--) {
    $html .= '<tr>';
    foreach ($columns as $column) {
      $html .= '<td>&nbsp;</td>';
    }
    $html .= '<td>';
    $html .= '<button style="opacity: 0">Edit</button>';
    $html .= '<button style="opacity: 0">Remove</button>';
    $html .= '</td>';
    $html .= '</tr>';
  }
  $html .= '</tbody>';
  $html .= '</table>';
  $html .= '</div>';
  $html .= '<footer data-target="' . htmlspecialchars($footer_target) . '">';
  $html .= '<div>' . $row_count . ' rows</div>';
  $html .= '<br>';
  $html .= '<div>' . $state->page . ' of ' . $page_count . '</div>';
  $html .= '<button data-id="first">First</button>';
  $html .= '<button data-id="previous">Previous</button>';
  $html .= '<button data-id="next">Next</button>';
  $html .= '<button data-id="last">Last</button>';
  $html .= '</footer>';
  $html .= '</div>';
  fx_emit($html);
  if (
    fx_event()->type == 'click'
    && fx_event()->target == $header_target
    && fx_event()->id == 'add'
  ) {
    $row = [];
    foreach ($columns as $column) {
      $row[$column] = '';
    }
    $state->is_add = true;
    $state->edit_index = -1;
    $state->row = (object) $row;
    fx_focus($tbody_target, $columns[0]);
  }
  if (
    fx_event()->type == 'change'
    && fx_event()->target == $header_target
    && fx_event()->id == 'search'
  ) {
    $state->search = fx_event()->value;
    $state->page = 1;
    _fx_data_grid_reset_edit($state);
  }
  if (
    fx_event()->type == 'click'
    && fx_event()->target == $thead_target
  ) {
    if ($state->sort) {
      if ($state->sort->column == fx_event()->id) {
        if ($state->sort->order == 1) {
          $state->sort->order = -1;
        } else {
          $state->sort = null;
        }
      } else {
        $state->sort = (object) ['column' => fx_event()->id, 'order' => 1];
      }
    } else {
      $state->sort = (object) ['column' => fx_event()->id, 'order' => 1];
    }
    $state->page = 1;
    _fx_data_grid_reset_edit($state);
  }
  if (
    fx_event()->type == 'click'
    && fx_event()->target == $tbody_target
  ) {
    switch (fx_event()->id) {
      case 'edit':
        $state->is_add = false;
        $state->edit_index = intval(fx_event()->tag);
        $state->row = clone $paged_rows[$state->edit_index];
        fx_focus($tbody_target, $columns[0]);
        break;
      case 'remove':
        $source_index = array_search($paged_rows[intval(fx_event()->tag)], $rows);
        array_splice($rows, $source_index, 1);
        _fx_data_grid_reset_edit($state);
        break;
      case 'save':
        if ($state->is_add) {
          array_unshift($rows, $state->row);
        } else {
          $source_index = array_search($paged_rows[$state->edit_index], $rows);
          $rows[$source_index] = $state->row;
        }
        _fx_data_grid_reset_edit($state);
        break;
      case 'cancel':
        _fx_data_grid_reset_edit($state);
        break;
    }
  }
  if (
    fx_event()->type == 'change'
    && fx_event()->target == $tbody_target
  ) {
    $state->row->{fx_event()->id} = fx_event()->value;
  }
  if (
    fx_event()->type == 'click'
    && fx_event()->target == $footer_target
  ) {
    switch (fx_event()->id) {
      case 'first':
        $state->page = 1;
        break;
      case 'previous':
        if ($state->page > 1) {
          $state->page--;
        }
        break;
      case 'next':
        if ($state->page < $page_count) {
          $state->page++;
        }
        break;
      case 'last':
        $state->page = $page_count;
        break;
    }
    _fx_data_grid_reset_edit($state);
  }
  return $rows;
}

function fx_data_grid(array $columns, array $initial_rows = []): array
{
  $target = 'data_grid_' . implode('_', $columns);
  if (fx_no_state($target)) {
    $state = _fx_data_grid_state();
    $state->rows = $initial_rows;
    fx_set_state($target, $state);
  } else {
    $state = fx_get_state($target);
  }
  return $state->rows = fx_data_grid_s($columns, $state->rows);
}

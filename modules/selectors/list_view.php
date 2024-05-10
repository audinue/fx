<?php

function _fx_list_view(bool $is_grid, string $target, array $items): ?object
{
  $html = '<div class="fx-list-view' . ($is_grid ? ' fx-list-view-grid' : '') . '" data-target="' . htmlspecialchars($target) . '">';
  foreach ($items as $index => $item) {
    $html .= '<button data-id="' . $index . '">';
    if (isset($item->image)) {
      $html .= '<img src="' . htmlspecialchars($item->image) . '" loading="lazy">';
    }
    $html .= '<span class="fx-list-view-title">' . htmlspecialchars($item->title) . '</span>';
    if (isset($item->subtitle)) {
      $html .= '<span class="fx-list-view-subtitle">' . htmlspecialchars($item->subtitle) . '</span>';
    }
    $html .= '</button>';
  }
  $html .= '</div>';
  fx_emit($html);
  if (fx_event()->type == 'click' && fx_event()->target == $target) {
    return $items[fx_event()->id];
  } else {
    return null;
  }
}

function fx_list_view(string $target, array $items): ?object
{
  return _fx_list_view(false, $target, $items);
}

function fx_grid_view(string $target, array $items): ?object
{
  return _fx_list_view(true, $target, $items);
}

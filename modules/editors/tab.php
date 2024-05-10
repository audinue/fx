<?php

function fx_begin_tab_s(array $pages, string $selected): string
{
  $target = 'tab_' . implode('_', $pages);
  $target_html = htmlspecialchars($target);
  $html = '<div class="fx-tab" data-target="' . $target_html . '">';
  $html .= '<div class="fx-tab-header">';
  foreach ($pages as $page) {
    $page_html = htmlspecialchars($page);
    $html .= '<button data-id="' . $page_html . '"' . ($page == $selected ? ' class="fx-tab-current"' : '') . '>' . $page_html . '</button>';
  }
  $html .= '<div class="fx-tab-filler"></div>';
  $html .= '</div>';
  $html .= '<div class="fx-tab-content">';
  fx_emit($html);
  if (fx_event()->type == 'click' && fx_event()->target == $target) {
    return fx_event()->id;
  } else {
    return $selected;
  }
}

function fx_begin_tab($pages, $initial_selected = '')
{
  $target = 'tab_' . implode('_', $pages);
  return fx_set_state(
    $target,
    fx_begin_tab_s(
      $pages,
      fx_state($target, $initial_selected)
    )
  );
}

function fx_end_tab()
{
  fx_emit('</div></div>');
}

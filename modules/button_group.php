<?php

function fx_button_group($buttons)
{
  $target = 'button_group_' . implode('_', $buttons);
  $target_html = htmlspecialchars($target);
  $html = '<div class="fx-button-group" data-target="' . $target_html . '">';
  foreach ($buttons as $button) {
    $button_html = htmlspecialchars($button);
    $html .= '<button data-id="' . $button_html . '">' . $button_html . '</button>';
  }
  $html .= '</div>';
  fx_emit($html);
  if (fx_event()->type == 'click' && fx_event()->target == $target) {
    return fx_event()->id;
  }
}

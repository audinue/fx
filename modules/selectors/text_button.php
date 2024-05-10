<?php

function fx_text_button(string $label): bool
{
  $label_html = htmlspecialchars($label);
  fx_emit('<button class="fx-text-button" data-target="' . $label_html . '">' . $label_html . '</button>');
  return fx_event()->type == 'click' && fx_event()->target == $label;
}

<?php

function fx_button($label)
{
  $label_html = htmlspecialchars($label);
  fx_emit('<button data-target="' . $label_html . '">' . $label_html . '</button>');
  return fx_event()->type == 'click' && fx_event()->target == $label;
}

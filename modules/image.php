<?php

function fx_image($url)
{
  $url_html = htmlspecialchars($url);
  fx_emit('<img src="' . $url_html . '">');
}

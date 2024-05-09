<?php

function fx_audio($url)
{
  $url_html = htmlspecialchars($url);
  fx_emit('<audio src="' . $url_html . '" controls></audio>');
}

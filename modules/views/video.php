<?php

function fx_video($url)
{
  $url_html = htmlspecialchars($url);
  fx_emit('<video src="' . $url_html . '" controls></video>');
}

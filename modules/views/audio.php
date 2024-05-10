<?php

function fx_audio(string $url): void
{
  $url_html = htmlspecialchars($url);
  fx_emit('<audio src="' . $url_html . '" controls></audio>');
}

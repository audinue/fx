<?php

function fx_frame(string $url): void
{
  $url_html = htmlspecialchars($url);
  fx_emit('<iframe src="' . $url_html . '"></iframe>');
}

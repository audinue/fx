<?php

function fx_begin_dialog(): void
{
  fx_emit('<div class="fx-dialog"><div>');
}

function fx_end_dialog(): void
{
  fx_emit('</div></div>');
}

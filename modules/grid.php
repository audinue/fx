<?php

function fx_begin_row()
{
  fx_emit('<div class="fx-row">');
}

function fx_end_row()
{
  fx_emit('</div>');
}

function fx_begin_column()
{
  fx_emit('<div class="fx-column">');
}

function fx_end_column()
{
  fx_emit('</div>');
}

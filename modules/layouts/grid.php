<?php

function fx_begin_row(): void
{
  fx_emit('<div class="fx-row">');
}

function fx_end_row(): void
{
  fx_emit('</div>');
}

function fx_begin_column(): void
{
  fx_emit('<div class="fx-column">');
}

function fx_end_column(): void
{
  fx_emit('</div>');
}

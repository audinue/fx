<?php

function fx_begin_form(): void
{
  fx_emit('<form>');
}

function fx_end_form(): void
{
  fx_emit('</form>');
}

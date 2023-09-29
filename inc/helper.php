<?php

function mo_inc(string $name): void
{
    include MO_DIR_INC . $name . '.php';
}

function mo_template(string $name, $arg = null): void
{
    include MO_DIR_TEMPLATE . $name . '.php';
}
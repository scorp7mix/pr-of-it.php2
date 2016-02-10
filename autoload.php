<?php

//error_reporting(E_ALL);

set_exception_handler(function ($e) {
    echo 'Ошибка: ' . $e->getMessage() . "\n";
});

define('DS', DIRECTORY_SEPARATOR);

function __autoload($class)
{
    $path = __DIR__ . DS . str_replace(['/', '\\'], DS, $class) . '.php';

    if (!file_exists($path)) {
        return false;
    }

    require $path;
}
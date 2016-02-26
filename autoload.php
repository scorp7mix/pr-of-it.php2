<?php

//error_reporting(E_ALL);

set_exception_handler(function ($e) {
    echo 'Ошибка: ' . $e->getMessage() . "\n";
});

define('DS', DIRECTORY_SEPARATOR);

require str_replace(['/', '\\'], DS, __DIR__ . '/vendor/autoload.php');

spl_autoload_register(function ($class) {
    $path = __DIR__ . DS . str_replace(['/', '\\'], DS, $class) . '.php';

    if (!file_exists($path)) {
        return false;
    }

    require $path;
});

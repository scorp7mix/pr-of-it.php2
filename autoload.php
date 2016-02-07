<?php

error_reporting(E_ALL);

set_exception_handler(function ($e) {
    echo 'Ошибка: ' . $e->getMessage() . "\n";
});

function __autoload($class)
{
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}
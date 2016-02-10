<?php

require __DIR__ . '/../autoload.php';

preg_match('~^/?([\w|/]+)?/(\w+)/?(\?.*)?$~', $_SERVER['REQUEST_URI'], $matches);
$parsedControllerName = str_replace('/','\\', ucwords($matches[1], '/'));
$parsedActionName = ucfirst($matches[2]);

$controllerName = '\App\Controllers\\' . ($parsedControllerName ?: 'News') . 'Controller';
$actionName = $parsedActionName ?: 'Index';

$controller = new $controllerName();
$controller->action($actionName);

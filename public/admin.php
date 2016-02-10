<?php

require __DIR__ . '/../autoload.php';

$controllerName = '\App\Controllers\Admin\\' . ucfirst($_GET['ctrl'] ?? 'news') . 'Controller';
$actionName = ucfirst($_GET['act'] ?? 'index');

$controller = new $controllerName();
$controller->action($actionName);

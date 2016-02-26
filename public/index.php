<?php

require __DIR__ . '/../autoload.php';

// При наличии одного поля в URI оно рассматривается как имя действия
// Если их больше, то предшествующие поля рассматриваются как
// имя контроллера
preg_match('~^/?([\w|/]+)?/(\w+)/?(\?.*)?$~', $_SERVER['REQUEST_URI'], $matches);
$parsedControllerName = str_replace('/','\\', ucwords($matches[1], '/'));
$parsedActionName = ucfirst($matches[2]);

$controllerName = '\App\Controllers\\' . ($parsedControllerName ?: 'News');
$actionName = $parsedActionName ?: 'Index';

try {
    $controller = new $controllerName();
    $controller->action($actionName);
} catch (\App\Exceptions\DB $e) {
    \App\Logger::instance()->logException($e);
    (new \App\View())->display('../App/Templates/Errors/Db.php', ['error' => $e]);
} catch (\App\Exceptions\NotFound $e) {
    \App\Logger::instance()->logException($e);
    (new \App\View())->display('../App/Templates/Errors/NotFound.php', ['error' => $e]);
}

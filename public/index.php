<?php

require __DIR__ . '/../autoload.php';

/*$view = new \App\View();
$view->lastNews = \App\Models\News::findLastRows(3);
$view->display(__DIR__ . '/../App/Templates/index.php');*/

$controller = new \App\Controllers\NewsController();
$controller->action('index');

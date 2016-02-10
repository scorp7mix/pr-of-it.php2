<?php

require __DIR__ . '/../autoload.php';

/*$id = $_GET['id'] ?: false;
if (false === $id) {
    header('Location: /index.php');
    exit(0);
}

$view = new \App\View();
$view->article = \App\Models\News::findByID($id);
$view->display(__DIR__ . '/../App/Templates/article.php');*/

$controller = new \App\Controllers\NewsController();
$controller->action('show');


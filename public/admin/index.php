<?php

require __DIR__ . '/../../autoload.php';

$view = new \App\View();
$view->lastNews = \App\Models\News::findAll();
$view->display(__DIR__ . '/../../App/Templates/Admin/index.php');

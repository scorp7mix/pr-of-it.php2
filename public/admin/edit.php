<?php

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'] ?? false;
if (false !== $id) {
    $article = \App\Models\News::findByID($id);
} else {
    $article = new \App\Models\News();
}

if (!empty($_POST)) {
    $article->fillByPost();
    if ($article->save()) {
        header('Location: /admin/index.php');
        exit(0);
    }
};

$view = new \App\View();
$view->article = $article;
$view->authors = \App\Models\Author::findAll();
$view->display(__DIR__ . '/../../App/Templates/Admin/edit.php');

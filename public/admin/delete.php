<?php

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'] ?? false;
if (false === $id) {
    header('Location: /admin/index.php');
}

$article = \App\Models\News::findByID($id);
if ($article->delete()) {
    header('Location: /admin/index.php');
}
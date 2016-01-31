<?php

require __DIR__ . '/../autoload.php';

$id = $_GET['id'] ?: false;
if (false === $id) {
    header('Location: /index.php');
}

$article = \App\Models\News::findByID($id);

ob_start();

include __DIR__ . '/../App/Templates/article.php';

echo ob_get_clean();

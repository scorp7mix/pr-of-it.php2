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
    }
};

ob_start();

include __DIR__ . '/../../App/Templates/Admin/edit.php';

echo ob_get_clean();

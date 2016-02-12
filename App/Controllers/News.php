<?php
namespace App\Controllers;

use App\Controller;

class News extends Controller
{
    protected function actionIndex()
    {
        $this->view->display('index.php', ['lastNews' => \App\Models\News::findLastRows(3)]);
    }

    protected function actionShow()
    {
        $id = $_GET['id'] ?: false;
        $this->redirectIf('/admin/news/index', false === $id);

        $this->view->display('article.php', ['article' => \App\Models\News::findByID($id)]);
    }
}
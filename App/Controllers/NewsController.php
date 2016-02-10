<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class NewsController extends Controller
{
    protected function actionIndex()
    {
        $this->view->display('index.php', ['lastNews' => News::findLastRows(3)]);
    }

    protected function actionShow()
    {
        $id = $_GET['id'] ?: false;
        if (false === $id) {
            header('Location: /index.php');
            exit(0);
        }

        $this->view->display('article.php', ['article' => News::findByID($id)]);
    }
}
<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class NewsController extends Controller
{
    protected function actionIndex()
    {
        $this->view->lastNews = News::findLastRows(3);
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }

    protected function actionShow()
    {
        $id = $_GET['id'] ?: false;
        if (false === $id) {
            header('Location: /index.php');
            exit(0);
        }

        $this->view->article = News::findByID($id);
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }
}
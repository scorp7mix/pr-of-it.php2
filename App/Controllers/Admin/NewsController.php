<?php
namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Author;
use App\Models\News;

class NewsController extends Controller
{
    protected function actionIndex()
    {
        $this->view->lastNews = News::findAll();
        $this->view->display(__DIR__ . '/../../Templates/Admin/index.php');
    }

    protected function actionEdit()
    {
        $id = $_GET['id'] ?? false;
        if (false !== $id) {
            $article = News::findByID($id);
        } else {
            $article = new News();
        }

        if (!empty($_POST)) {
            $article->fillByPost();
            if ($article->save()) {
                header('Location: /admin/news/index');
                exit(0);
            }
        };

        $this->view->article = $article;
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../Templates/Admin/edit.php');
    }

    protected function actionDelete()
    {
        $id = $_GET['id'] ?? false;
        if (false === $id) {
            header('Location: /admin/news/index');
            exit(0);
        }

        $article = News::findByID($id);
        if ($article->delete()) {
            header('Location: /admin/news/index');
        }
    }
}
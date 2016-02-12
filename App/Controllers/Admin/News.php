<?php
namespace App\Controllers\Admin;

use App\Controller;

class News extends Controller
{
    protected function actionIndex()
    {
        $this->view->display('index.php', ['lastNews' => \App\Models\News::findAll()]);
    }

    protected function actionEdit()
    {
        $id = $_GET['id'] ?? false;
        if (false !== $id) {
            $article = \App\Models\News::findByID($id);
        } else {
            $article = new \App\Models\News();
        }

        if (!empty($_POST)) {
            $article->fillByPost();
            $this->redirectIf('/admin/news/index', $article->save());
        };

        $this->view->display('edit.php',
            [
                'article' => $article,
                'authors' => \App\Models\Author::findAll(),
            ]
        );
    }

    protected function actionDelete()
    {
        $id = $_GET['id'] ?? false;
        $this->redirectIf('/admin/news/index', false === $id);

        $article = \App\Models\News::findByID($id);
        $this->redirectIf('/admin/news/index', $article->delete());
    }
}
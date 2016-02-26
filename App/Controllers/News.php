<?php

namespace App\Controllers;

use App\Controller;

class News extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function actionIndex()
    {
        $this->view->twigDisplay('index.html.twig', ['lastNews' => \App\Models\News::findLastRows(3)]);
    }

    protected function actionShow()
    {
        $id = $_GET['id'] ?: false;
        $this->redirectIf('/admin/news/index', false === $id);

        if (false === ($article = \App\Models\News::findByID($id))) {
            throw new \App\Exceptions\NotFound($_SERVER['REQUEST_URI']);
        }

        $this->view->twigDisplay('article.html.twig', ['article' => $article]);
    }
}

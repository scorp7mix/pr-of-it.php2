<?php
namespace App\Controllers\Admin;

use App\Components\AdminDataTable;
use App\Controller;
use Scorp7mix\MultiException;

class News extends Controller
{
    protected function actionIndex()
    {
        $lastNews = \App\Models\News::findAll();
        $dataTable = new AdminDataTable(
            $lastNews,
            function ($m) {
                return $m->id;
            },
            function ($m) {
                return $m->date;
            },
            function ($m) {
                return $m->title;
            },
            function ($m) {
                return $m->author->name;
            }
        );

        $this->view->display('indexTable.php', ['data' => $dataTable->render()]);
    }

    protected function actionEdit()
    {
        $id = $_GET['id'] ?? false;
        if (false !== $id) {
            if (false === ($article = \App\Models\News::findByID($id))) {
                throw new \App\Exceptions\NotFound($_SERVER['REQUEST_URI']);
            }
        } else {
            $article = new \App\Models\News();
        }

        if (!empty($_POST)) {
            try {
                $article->fillByPost($_POST);
            } catch (MultiException $e) {
                $this->view->display('edit.php',
                    [
                        'article' => $article,
                        'authors' => \App\Models\Author::findAll(),
                        'errors' => $e
                    ]
                );
                exit(0);
            }
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

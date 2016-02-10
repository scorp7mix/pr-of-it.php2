<?php
namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $this->beforeAction();

        $method = 'action' . ucfirst($action);
        return $this->$method();
    }

    protected function beforeAction() {}
}
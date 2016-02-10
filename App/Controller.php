<?php
namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {

        $path = str_replace(['App\Controllers\\', 'Controller'], '', get_called_class());
        $moduleRoot = substr($path, 0, strrpos($path, '\\'));
        $templatePath = str_replace(['/', '\\'], DS, __DIR__ . '/Templates/' . $moduleRoot . '/');

        $this->view = new View($templatePath);
    }

    public function action($action)
    {
        $this->beforeAction();

        $method = 'action' . ucfirst($action);
        return $this->$method();
    }

    protected function beforeAction() {}
}
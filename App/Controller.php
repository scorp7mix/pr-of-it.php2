<?php
namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {

        $path = str_replace('App\Controllers\\', '', get_called_class());
        $moduleRoot = substr($path, 0, strrpos($path, '\\'));
        $templatePath = str_replace(['/', '\\'], DS, __DIR__ . '/Templates/' . $moduleRoot . '/');

        $this->view = new View();
        $this->view->setTemplatePath($templatePath);
    }

    public function action($action)
    {
        $this->beforeAction();

        $method = 'action' . ucfirst($action);
        return $this->$method();
    }

    protected function redirect($location)
    {
        header("Location: " . $location);
        exit(0);
    }

    protected function redirectIf($location, $condition)
    {
        if ($condition) {
            $this->redirect($location);
        }
    }

    protected function beforeAction() {}
}
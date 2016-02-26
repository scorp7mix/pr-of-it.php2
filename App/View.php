<?php

namespace App;

class View
{
    protected $templatePath;
    protected $layout;

    public function __construct()
    {
        $this->layout = str_replace(['/', '\\'], DS, __DIR__ . '/Templates/Layouts/main.php');
    }

    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($template, $output = [])
    {
        if (!empty($output)) {
            foreach ($output as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include $this->templatePath . $template;
        $content =  ob_get_clean();

        $resources = \PHP_Timer::resourceUsage();

        ob_start();
        include $this->layout;
        return  ob_get_clean();
    }

    public function display($template, $output = [])
    {
        echo $this->render($template, $output);
    }
}

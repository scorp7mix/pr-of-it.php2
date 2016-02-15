<?php

namespace App;

class View
{
    protected $templatePath;

    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
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
        return ob_get_clean();
    }

    public function display($template, $output = [])
    {
        echo $this->render($template, $output);
    }
}
<?php

namespace App;

use App\Core\Std;

class View
{
    use Std;

    public function render($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }

    public function display($template)
    {
        echo $this->render($template);
    }
}
<?php

namespace Mvc\Controllers;

abstract class BaseController
{
    public $folder;

    protected function render($view, $data = [])
    {
        $root = 'app/';

        $view_file = $root . 'Views' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $view . '.php';

        if (is_file($view_file)) {
            extract($data); # Convert data array to params
            require_once($view_file);

        } else {
            echo 'can\'t find view file';
        }
    }
}
//            ob_start();
//            $content = ob_get_clean();

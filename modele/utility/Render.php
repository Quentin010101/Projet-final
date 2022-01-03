<?php

class Renderer
{
    public static function render($view, $template, $variable = []){

        if(!empty($variable)){
            extract($variable);
        }
        ob_start();
        require_once('./view/' . $view . '.view.php');
        $content = ob_get_clean();
        require_once('./view/template/' . $template . '.php');
    }
}
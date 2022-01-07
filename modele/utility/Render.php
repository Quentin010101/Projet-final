<?php

class Renderer
{
    public static function render($view, $template, $variable = [])
    {

        if (!empty($variable)) {
            extract($variable);
        }

        if ($view != 'signIn' && $view != 'signUp') :
            ob_start();
            if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) :
                require_once('./view/header/headerUser.view.php');
            else :
                require_once('./view/header/header.view.php');
            endif;
            $contentHeader = ob_get_clean();
        endif;
        
        ob_start();
        require_once('./view/' . $view . '.view.php');
        $content = ob_get_clean();

        require_once('./view/template/' . $template . '.php');
    }
}

<?php 

class Redirection
{
    public static function redirect($url){
        header('Location: ' . $url);
    }
}
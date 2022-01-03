<?php

class Application
{
    public static function process(){

        $contrName = 'Home';
        $method = 'index';

        if((isset($_GET['contr']) AND isset($_GET['action'])) AND (!empty($_GET['contr']) AND !empty($_GET['action']))){
            
            $method = $_GET['action'];
            $contr = $_GET['contr'];
            $contrName = ucfirst($contr);

            
        } 
        $instance = new $contrName();
        $instance->$method();
    }
}
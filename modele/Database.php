<?php 



class Database
{
    protected function connect(){
    
        $username = 'root';
        $password = '';
    
        $dbb = new PDO('mysql:host=localhost;dbname=ecovoit;charset=utf8', $username, $password);
    
        return $dbb;
    
    }

}
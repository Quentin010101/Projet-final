<?php

require_once('./modele/Database.php');

class SignIn extends Database
{
    private $email;
    private $password;
    private $erreur;


    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    private function getUser(){

        $query = 'SELECT * FROM person WHERE email = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        $count = $stmt->rowCount();

        if($count >= 1){
            $request = $stmt->fetch();     
            return $request;
        }
        else{
            $this->erreur = 'email invalid';
        }
    }

    private function checkSignIn(){

        $request = $this->getUser();
        if(!empty($request)){
            if(password_verify($this->password, $request['password'])){
                $_SESSION['person_id'] = $request['person_id'];
                $_SESSION['pseudo'] = $request['pseudo'];
                $_SESSION['name'] = $request['name'];
                $_SESSION['surname'] = $request['surname'];
                $_SESSION['email'] = $request['email'];
                $_SESSION['date'] = $request['date'];
            }
            else{
                $this->erreur = 'mot de passe invalid';
            }
        }

    }

    public function set(){
        $this->checkSignIn();
    }
    public function getErreur(){
        echo $this->erreur;
    }
}


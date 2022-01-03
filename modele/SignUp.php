<?php

require_once('./modele/Database.php');

class SignUp extends Database
{
    protected $pseudo;
    protected $name;
    protected $surname;
    protected $email;
    protected $password;
    protected $erreur;
    protected bool $erreurUserExist = true;


    public function __construct($pseudo, $name, $surname, $email, $password, $passwordConfirmed)
    {

        if(self::checkLenght($pseudo, 20)){
            $this->pseudo = $pseudo;
        }
        else{
            $this->erreur = 'Le pseudo est trop long';
        }
        if(self::checkLenght($name, 20)){
            $this->name = $name;
        }
        else{
            $this->erreur = 'Le prenom est trop long';
        }
        if(self::checkLenght($surname, 20)){
            $this->surname = $surname;
        }
        else{
            $this->erreur = 'Le nom est trop long';
        }
        if(self::checkLenght($email, 30)){
            if(self::checkEmail($email)){
                $this->email = $email;
            }
            else{
                $this->erreur = "Email non valide";
            }
        }
        else{
            $this->erreur = "votre email est trop long";
        }
        if(self:: checkLenght($password, 40)){
            if(self::checkPassword($password,$passwordConfirmed)){
                if(self::checkRegex($password)){
                    $this->password = password_hash($password, PASSWORD_DEFAULT);
                }
                else{
                    $this->erreur = 'Le mot de passe doit contenir une majuscule, une minuscule, et un chiffre';
                }
            }
            else{
                $this->erreur = 'Mot de passe ne correspondent pas';
            }
        }
        else{
            $this->erreur = 'votre mot de passe est trop long';
        }

    }

    protected static function checkPassword($password, $passwordConfirmed){
        //verification password correspondent
        $result = $password == $passwordConfirmed ? true : false;
        return $result;
    }
    protected static function checkRegex($password){
        //verification password contient maj, min, number
        $result = preg_match('/[0-9]/i', $password) AND preg_match('/[a-z]/i', $password) AND preg_match('/[A-Z]/i', $password) ? true : false;
        return $result;
    }
    protected static function checkEmail($email){
        //verification email
        $result = filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
        return $result;
    }
    protected static function checkLenght($parm, int $length){
        //verification de la longueur du parametre
        $result = strlen($parm) <= $length ? true : false;
        return $result;
    }

    protected function checkUserExist(){
        //verification si l'email existe dejà
        $query = 'SELECT email FROM person WHERE email = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($this->email));
         
        $count = $stmt->rowCount();
        return $count;

    }

    public function set(){

        $count = $this->checkUserExist();
        if($count == 0){
            $pdo = $this->connect();
            //creation de la table person
            $query = 'INSERT INTO person(pseudo, name, surname, email, password, date) VALUES(?, ?, ?, ?, ?, NOW())';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->pseudo, $this->name, $this->surname, $this->email, $this->password]);
            $personId = $pdo->lastInsertId();

            //Creation de la table user

            $query = 'INSERT INTO user(person_id) VALUES(?)';
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($personId));

            $this->erreurUserExist = false;
        }
        else{
            $this->erreurUserExist = true;
        }

        
    }

    public function getErreur(){
        return $this->erreur;
    }
    public function getErreurUserExist(){
        return $this->erreurUserExist;
    }
}

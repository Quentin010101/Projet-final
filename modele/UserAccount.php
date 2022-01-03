<?php

namespace Model;

require_once('./modele/Database.php');

class User extends \Database
{
    // Find
    public function findPreference($person_id){

        $query = 'SELECT * FROM user WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));
        $request = $stmt->fetch();

        return $request;
    }

    public function findPersonnalInformation($person_id){

        $query = 'SELECT name, surname, email, pseudo, phoneNumber FROM person WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));
        $request = $stmt->fetch();

        return $request;
    }

    // Update
    public function updatePersonnalInformation($pseudo, $name, $surname, $email, $phoneNumber, $person_id){


        $query = 'UPDATE person SET pseudo = ? , name = ? , surname = ? , email = ? , phoneNumber = ? WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($pseudo, $name, $surname, $email, $phoneNumber, $person_id));
    }

    public function updatePreference($music, $talk, $smoker, $pet, $avatar, $person_id){
        $query = 'UPDATE user SET music = ? , talk = ? , smoker = ? , pet = ? , avatar = ? WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($music, $talk, $smoker, $pet, $avatar, $person_id));
    }

}
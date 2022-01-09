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
    public function findPreferenceAvatar($person_id){

        $query = 'SELECT avatar FROM user WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));
        $request = $stmt->fetch();

        return $request;
    }

    public function findPersonnalInformation($person_id){

        $query = 'SELECT name, surname, email, pseudo, phoneNumber, date FROM person WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));
        $request = $stmt->fetch();

        return $request;
    }

    // Update
    public function updatePersonnalInformation($pseudo, $name, $surname, $email, $phoneNumber, $person_id){

        $query = 'UPDATE person SET pseudo = ? , name = ? , surname = ? , email = ? , phoneNumber = ? WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $msg = $stmt->execute(array($pseudo, $name, $surname, $email, $phoneNumber, $person_id));

        if($msg == true):
            return 's1';
        else:
            return 'e3';
        endif;    
    }

    public function updatePreference($light, $music, $talk, $smoker, $pet, $person_id){
        
        $query = 'UPDATE user SET light = ? , music = ? , talk = ? , smoker = ? , pet = ?  WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $msg = $stmt->execute(array($light, $music, $talk, $smoker, $pet, $person_id));

        if($msg == true):
            return 's2';
        else:
            return 'e4';
        endif;   

    }
    public function updatePreferenceAvatar($avatar, $person_id){

        $query = 'UPDATE user SET avatar = ?  WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($avatar, $person_id));

    }

}
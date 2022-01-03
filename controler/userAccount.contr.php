<?php

require_once('./modele/UserAccount.php');

class User
{
    public function show(){
        $user = new \Model\User();
        $preferences = $user->findPreference($_SESSION['person_id']);
        $personals = $user->findPersonnalInformation($_SESSION['person_id']);
        Renderer::render('userAccount', 'template', compact('preferences', 'personals'));
    }

    public function update(){
        
        if((isset($_POST['modifyPersonnal']) AND isset($_POST['pseudo']) AND isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['email']) AND isset($_POST['phoneNumber'])) 
        AND (!empty($_POST['pseudo']) AND !empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['email']) AND !empty($_POST['phoneNumber']))){           
            $user = new \Model\User();
            $user->updatePersonnalInformation($_POST['pseudo'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phoneNumber'], $_SESSION['person_id']);
        }
        if((isset($_POST['modifyPreference']) AND isset($_POST['music']) AND isset($_POST['talk']) AND isset($_POST['smoker']) AND isset($_POST['pet']) AND isset($_POST['avatar'])) 
        AND (!empty($_POST['music']) AND !empty($_POST['talk']) AND !empty($_POST['smoker']) AND !empty($_POST['pet']) AND !empty($_POST['avatar']))){           
            $user = new \Model\User();
            $user->updatePersonnalInformation($_POST['music'], $_POST['talk'], $_POST['smoker'], $_POST['pet'], $_POST['avatar'], $_SESSION['person_id']);
        }

        Redirection::redirect('./index.php?contr=user&action=show');
    }
}
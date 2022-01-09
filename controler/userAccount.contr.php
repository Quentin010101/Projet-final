<?php

require_once('./modele/UserAccount.php');
require_once('./modele/Journey.php');

class User
{
    public function show(){
        if(isset($_SESSION['person_id']) AND !empty($_SESSION['person_id'])){
            $user = new \Model\User();
            $journey = new \Model\Ride();
            // show user preferences
            $preferences = $user->findPreference($_SESSION['person_id']);
            $_SESSION['light'] = $preferences['light'];
            // show user personnal information
            $personals = $user->findPersonnalInformation($_SESSION['person_id']);
            // show user journey
            $journeys = $journey->findRideByPersonId($_SESSION['person_id']);
            // error
            $msg = $this->manageError();

            Renderer::render('userAccount', 'template', compact('preferences', 'personals', 'journeys', 'msg'));
        }else {
            // if no session redirect to home
            Redirection::redirect('./index.php');
        }
    }

    public function update(){
        $msg = '';
        if((isset($_POST['modifyPersonnal']) AND isset($_POST['pseudo']) AND isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['email']) AND isset($_POST['phoneNumber'])) 
        AND (!empty($_POST['pseudo']) AND !empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['email']) AND !empty($_POST['phoneNumber']))){           

            $user = new \Model\User();
            $msg = $user->updatePersonnalInformation($_POST['pseudo'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phoneNumber'], $_SESSION['person_id']);
        }
        if((isset($_POST['modifyPreference']) AND isset($_POST['light']) AND isset($_POST['music']) AND isset($_POST['talk']) AND isset($_POST['smoker']) AND isset($_POST['pet']) AND isset($_FILES['avatar'])) 
        AND (!empty($_POST['music']) AND !empty($_POST['light']) AND !empty($_POST['talk']) AND !empty($_POST['smoker']) AND !empty($_POST['pet']) AND !empty($_FILES['avatar']))){   
            
            $user = new \Model\User();
            $avatarName = $user->findPreferenceAvatar($_SESSION['person_id']);
            $msg = $user->updatePreference($_POST['light'], $_POST['music'], $_POST['talk'], $_POST['smoker'], $_POST['pet'], $_SESSION['person_id']);
            
            if($_FILES['avatar']['size'] != 0):
                $filename = $this->checkFile($_FILES['avatar'], $avatarName);
                $user->updatePreferenceAvatar($filename, $_SESSION['person_id']);
            endif;
        }

        Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
    }

    private function checkFile($parm, $avatarName){

            $targetDir = "./public/asset/avatar/";
            $validExtension = array('jpg','png','jpeg');
            $sizeLimit = 1000000;

            $fileExtension = strtolower(pathinfo($parm['name'], PATHINFO_EXTENSION));
            if($parm['size'] > $sizeLimit || $parm['size'] <= 0):
                Redirection::redirect('./index.php?contr=user&action=show&msg=e1');
                exit;
            elseif(!in_array($fileExtension,$validExtension)):
                Redirection::redirect('./index.php?contr=user&action=show&msg=e2');
                exit;
            else:
                if($avatarName['avatar'] != 'avatarDefault.png'):
                unlink('./public/asset/avatar/' . $avatarName['avatar']);
                endif;
                $newFilename = uniqid() . '.' . $fileExtension;
                move_uploaded_file($parm['tmp_name'], $targetDir . $newFilename);
                return $newFilename;
            endif;
            
            

                
    }
    private function manageError(){
        if(isset($_GET['msg']) && !empty($_GET['msg'])):
            switch($_GET['msg']){
                case 'e1': return array('The size of your image is too high', 'error'); break;
                case 'e2': return array('The extension of your image is not accepted', 'error'); break;
                case 's1': return array('Your personnal information has been updated', 'sucess'); break;
                case 's2': return array('Your preferences have been updated', 'sucess'); break;
                case 'e3': return array('There have been a problem! please try again later', 'error'); break;
                case 'e4': return array('There have been a problem! please try again later', 'error'); break;
            }
        endif; 

        return '';
    }

}
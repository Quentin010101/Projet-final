<?php

require_once('./modele/UserAccount.php');
require_once('./modele/Journey.php');
require_once('./modele/Message.php');

class User
{
    public function show()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            $user = new \Model\User();
            $journey = new \Model\Ride();
            $journeyPassenger = new Reservation();
            $messages = new Message();

            //message
            $messagesSent = $messages->getBySender($_SESSION['person_id']);
            $messagesRecieved = $messages->getByDestinataire($_SESSION['person_id']);
            // show user preferences
            $preferences = $user->findPreference($_SESSION['person_id']);
            $_SESSION['light'] = $preferences['light'];
            // show user personnal information
            $personals = $user->findPersonnalInformation($_SESSION['person_id']);
            // show user journey
            $journeys = $journey->findRideByPersonId($_SESSION['person_id']);

            //check the nb reservation by journey_id
            $count = new Reservation();
            $i = 0;
             foreach($journeys as $j):
                $nbRes = $count->getNbReservation($j['journey_id']);
                $journeys[$i]['nbReservation'] = $nbRes['nbReservation'];
                $i++;
             endforeach;

            $journeysPassenger = $journeyPassenger->getByPersonId($_SESSION['person_id']);

            // error
            $msg = $this->manageError();

            Renderer::render('userAccount', 'template', compact('preferences', 'personals', 'journeys', 'journeysPassenger', 'msg', 'messagesSent', 'messagesRecieved'));
        } else {
            // if no session redirect to home
            Redirection::redirect('./index.php');
        }
    }
    public function showUser()
    {
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            $user = new \Model\User();
            $preferences = $user->findPreference($_GET['id']);
            $personals = $user->findPersonnalInformation($_GET['id']);

            Renderer::render('showUser', 'template', compact('preferences', 'personals'));
        }
    }

    public function update()
    {
        $msg = '';
        if ((isset($_POST['modifyPersonnal']) and isset($_POST['pseudo']) and isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['phoneNumber']))
            and (!empty($_POST['pseudo']) and !empty($_POST['name']) and !empty($_POST['surname']) and !empty($_POST['email']) and !empty($_POST['phoneNumber']))
        ) {

            $user = new \Model\User();
            $msg = $user->updatePersonnalInformation($_POST['pseudo'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phoneNumber'], $_SESSION['person_id']);
        }
        if ((isset($_POST['modifyPreference']) and isset($_POST['light']) and isset($_POST['music']) and isset($_POST['talk']) and isset($_POST['smoker']) and isset($_POST['pet']) and isset($_FILES['avatar']))
            and (!empty($_POST['music']) and !empty($_POST['light']) and !empty($_POST['talk']) and !empty($_POST['smoker']) and !empty($_POST['pet']) and !empty($_FILES['avatar']))
        ) {

            $user = new \Model\User();
            $avatarName = $user->findPreferenceAvatar($_SESSION['person_id']);
            $msg = $user->updatePreference($_POST['light'], $_POST['music'], $_POST['talk'], $_POST['smoker'], $_POST['pet'], $_SESSION['person_id']);

            if ($_FILES['avatar']['size'] != 0) :
                $filename = $this->checkFile($_FILES['avatar'], $avatarName);
                $user->updatePreferenceAvatar($filename, $_SESSION['person_id']);
            endif;
        }

        Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
    }

    private function checkFile($parm, $avatarName)
    {

        $targetDir = "./public/asset/avatar/";
        $validExtension = array('jpg', 'png', 'jpeg');
        $sizeLimit = 1000000;

        $fileExtension = strtolower(pathinfo($parm['name'], PATHINFO_EXTENSION));
        if ($parm['size'] > $sizeLimit || $parm['size'] <= 0) :
            Redirection::redirect('./index.php?contr=user&action=show&msg=e1');
            exit;
        elseif (!in_array($fileExtension, $validExtension)) :
            Redirection::redirect('./index.php?contr=user&action=show&msg=e2');
            exit;
        else :
            if ($avatarName['avatar'] != 'avatarDefault.png') :
                unlink('./public/asset/avatar/' . $avatarName['avatar']);
            endif;
            $newFilename = uniqid() . '.' . $fileExtension;
            move_uploaded_file($parm['tmp_name'], $targetDir . $newFilename);
            return $newFilename;
        endif;
    }
    public function sendMessage()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if ((isset($_POST['message']) and isset($_POST['destinataire_id'])) and (!empty($_POST['message']) and !empty($_POST['destinataire_id']))) {
                $message = new Message();
                $msg = $message->set($_SESSION['person_id'], $_POST['message'], $_POST['destinataire_id']);

                Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
            }
        }
    }
    public function reportMessage()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if (isset($_GET['id']) and !empty($_GET['id'])) {
                $report = new Message();
                $report->updateReport($_GET['id']);

                Redirection::redirect('./index.php?contr=user&action=show');
            }
        }
    }
    public function deleteMessageD()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if (isset($_GET['id']) and !empty($_GET['id'])) {
                $report = new Message();
                $report->deleteDestinataireMessage($_GET['id']);

                Redirection::redirect('./index.php?contr=user&action=show');
            }
        }
    }
    public function deleteMessageS()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if (isset($_GET['id']) and !empty($_GET['id'])) {
                $report = new Message();
                $report->deleteSenderMessage($_GET['id']);

                Redirection::redirect('./index.php?contr=user&action=show');
            }
        }
    }

    private function manageError()
    {
        if (isset($_GET['msg']) && !empty($_GET['msg'])) :
            switch ($_GET['msg']) {
                case 'e1':
                    return array('The size of your image is too high', 'error');
                    break;
                case 'e2':
                    return array('The extension of your image is not accepted', 'error');
                    break;
                case 's1':
                    return array('Your personnal information has been updated', 'sucess');
                    break;
                case 's2':
                    return array('Your preferences have been updated', 'sucess');
                    break;
                case 'e3':
                    return array('There have been a problem! please try again later', 'error');
                    break;
                case 'e4':
                    return array('There have been a problem! please try again later', 'error');
                    break;
                case 's3':
                    return array('Your ride has been published', 'sucess');
                    break;
                case 'e5':
                    return array('There have been a problem! please try again later', 'error');
                    break;
                case 's4':
                    return array('Congratulation your reservation has been made', 'sucess');
                    break;
                case 's5':
                    return array('Your reservation has been canceled', 'sucess');
                    break;
                case 'e6':
                    return array('Your already have a reservation for this ride', 'error');
                    break;
                case 'e7':
                    return array('This ride is full, sorry', 'error');
                    break;
                case 's6':
                    return array('Your message has been sent!', 'sucess');
                    break;
            }
        endif;

        return '';
    }
}

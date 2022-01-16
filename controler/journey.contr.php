<?php


class Ride
{
    public function showPublish()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            Renderer::render('publishRide', 'template');
        } else {
            $erreur = 'You need to Sign in if you want to publish.';
            Renderer::render('publishRide', 'template', compact('erreur'));
        }
    }
    public function showSearch()
    {
        if (isset($_POST['search'])) {
            if ((isset($_POST['startingPlace']) and isset($_POST['endingPlace']) and isset($_POST['dateRide'])) and (!empty($_POST['startingPlace']) and !empty($_POST['endingPlace']) and !empty($_POST['dateRide']))) {
                $ride = new \Model\Ride();
                $rides = $ride->findRideByPlaceDate($_POST['startingPlace'], $_POST['endingPlace'], $_POST['dateRide']);

                $variableStockage2 = array();
                //search by pet or smoker :
                if ((isset($_POST['pet']) and isset($_POST['smoker'])) and (!empty($_POST['pet']) and !empty($_POST['smoker']))) :
                    $variableStockage2 = array($_POST['smoker'], $_POST['pet']);
                    $rides = $this->sortByPetSmoker($_POST['pet'], $_POST['smoker'], $rides);
                endif;
                $variableStockage = array($_POST['startingPlace'], $_POST['endingPlace'], $_POST['dateRide']);
                Renderer::render('showSearchRide', 'template', compact('rides', 'variableStockage', 'variableStockage2'));
            } else {
                $erreur = 'You need to complete all entry';
                Renderer::render('searchRide', 'template', compact('erreur'));
            }
        } else {
            Renderer::render('searchRide', 'template');
        }
    }
    public function showOneRide()
    {
        if ((isset($_GET['id']) and isset($_GET['contr']) and isset($_GET['action'])) and (!empty($_GET['id']) and !empty($_GET['contr']) and !empty($_GET['action']))) {
 
            $ride = new \Model\Ride();
            $rideById = $ride->findRideByRideId($_GET['id']);
            $reservations = new Reservation();
            $reservation = $reservations->getByRideId($_GET['id']);

            if(isset($_GET['erreur']) AND !empty($_GET['erreur'])){
                $erreur = 'You need to be log in to book a ride';
                Renderer::render('showRide','template', compact('rideById', 'erreur', 'reservation'));
            }else{
                Renderer::render('showRide', 'template', compact('rideById', 'reservation'));
            }
        }
    }
    public function set()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if ((isset($_POST['startingPlace']) and isset($_POST['startingPlaceLatitude']) and isset($_POST['startingPlaceLongitude']) and isset($_POST['endingPlace']) and isset($_POST['endingPlaceLatitude']) and isset($_POST['endingPlaceLongitude']) and isset($_POST['rideDistance']) and isset($_POST['rideTime']) and isset($_POST['startingTime']) and isset($_POST['dateRide']) and isset($_POST['nbSeat'])) and
                (!empty($_POST['startingPlace']) and !empty($_POST['startingPlaceLatitude']) and !empty($_POST['startingPlaceLongitude']) and !empty($_POST['endingPlace']) and !empty($_POST['endingPlaceLatitude']) and !empty($_POST['endingPlaceLongitude']) and !empty($_POST['rideDistance']) and !empty($_POST['rideTime']) and !empty($_POST['startingTime']) and !empty($_POST['dateRide']) and !empty($_POST['nbSeat']))
            ) {

                $endingTime = $this->setEndingTime($_POST['rideTime'], $_POST['startingTime']);
                $ride = new \Model\Ride();
                $msg = $ride->setRide($_SESSION['person_id'], $_POST['startingPlace'], $_POST['startingPlaceLatitude'], $_POST['startingPlaceLongitude'], $_POST['endingPlace'], $_POST['endingPlaceLatitude'], $_POST['endingPlaceLongitude'], $_POST['rideDistance'], $_POST['rideTime'], $_POST['startingTime'], $endingTime, $_POST['dateRide'], $_POST['nbSeat']);
            }
            Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
        } else {
            Redirection::redirect('./index.php');
        }
    }
    public function book()
    {
        if ((isset($_POST['rideId']) and isset($_POST['book'])) and (!empty($_POST['rideId']) and !empty($_POST['book']))) {
            if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
                $reservation = new Reservation();
                $msg = $reservation->set($_POST['rideId'], $_SESSION['person_id']);

                Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
            }else{
                Redirection::redirect('./index.php?contr=ride&action=showOneRide&id=' . htmlspecialchars($_POST['rideId']) . '&erreur=noconnection');
            }
        }
    }
    private function setEndingTime($duration, $startingTime)
    {
        $timeRide = $duration;
        $timestamp = strtotime($startingTime);
        $timestamp = $timestamp + $timeRide * 3600;
        $newTime = date('H:i', $timestamp);

        return $newTime;
    }
    public function cancelRide()
    {

        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if (isset($_POST['rideId']) and !empty($_POST['rideId'])) {
                $journey = new \Model\Ride();
                $journey->cancelRide($_POST['rideId']);
                Redirection::redirect('./index.php?contr=user&action=show');
            }
        }
    }
    public function cancelReservation()
    {
        if (isset($_SESSION['person_id']) and !empty($_SESSION['person_id'])) {
            if (isset($_POST['rideId']) and !empty($_POST['rideId'])) {
                $reservationCancel = new Reservation();
                $msg = $reservationCancel->cancel($_POST['rideId']);
                Redirection::redirect('./index.php?contr=user&action=show&msg=' . $msg);
            }
        }
    }
    private function sortByPetSmoker($pet, $smoker, $tab)
    {

        $i = 0;
        foreach ($tab as $t) :
            if ($pet == 'pN') :
                if (in_array('No pet allowed!', $t)) :
                    unset($tab[$i]);
                endif;
            endif;
            if ($smoker == 'sN') :
                if (in_array('No smoker!', $t)) :
                    unset($tab[$i]);
                endif;
            endif;
            $i++;
        endforeach;

        return $tab;
    }
}

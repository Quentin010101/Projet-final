<?php


class Ride
{
    public function showPublish(){
        if(isset($_SESSION['person_id']) AND !empty($_SESSION['person_id'])){
            Renderer::render('publishRide', 'template');
        }else {
            $erreur = 'You need to Sign in if you want to publish.';
            Renderer::render('publishRide', 'template', compact('erreur'));
        } 
    }
    public function showSearch(){
        if(isset($_POST['search'])){
            if((isset($_POST['startingPlace']) AND isset($_POST['endingPlace']) AND isset($_POST['dateRide'])) AND (!empty($_POST['startingPlace']) AND !empty($_POST['endingPlace']) AND !empty($_POST['dateRide']))){
                $ride = new \Model\Ride();
                $rides = $ride->findRideByPlaceDate($_POST['startingPlace'], $_POST['endingPlace'], $_POST['dateRide']);
                
                Renderer::render('searchRide', 'template', compact('rides'));
            }else {
                $erreur = 'You need to complete all entry';
                Renderer::render('searchRide', 'template', compact('erreur'));
            }
        }else{
            Renderer::render('searchRide', 'template');
        }
    }
    public function set(){
        if(isset($_SESSION['person_id']) AND !empty($_SESSION['person_id'])){
            if((isset($_POST['startingPlace']) AND isset($_POST['startingPlaceLatitude']) AND isset($_POST['startingPlaceLongitude']) AND isset($_POST['endingPlace']) AND isset($_POST['endingPlaceLatitude']) AND isset($_POST['endingPlaceLongitude']) AND isset($_POST['rideDistance']) AND isset($_POST['rideTime']) AND isset($_POST['startingTime']) AND isset($_POST['dateRide']) AND isset($_POST['nbSeat'])) AND 
            (!empty($_POST['startingPlace']) AND !empty($_POST['startingPlaceLatitude']) AND !empty($_POST['startingPlaceLongitude']) AND !empty($_POST['endingPlace']) AND !empty($_POST['endingPlaceLatitude']) AND !empty($_POST['endingPlaceLongitude']) AND !empty($_POST['rideDistance']) AND !empty($_POST['rideTime']) AND !empty($_POST['startingTime']) AND !empty($_POST['dateRide']) AND !empty($_POST['nbSeat']))){

                $endingTime = $this->setEndingTime($_POST['rideTime'], $_POST['startingTime']);
                $ride = new \Model\Ride();
                $ride->setRide($_SESSION['person_id'], $_POST['startingPlace'], $_POST['startingPlaceLatitude'], $_POST['startingPlaceLongitude'], $_POST['endingPlace'], $_POST['endingPlaceLatitude'], $_POST['endingPlaceLongitude'], $_POST['rideDistance'], $_POST['rideTime'], $_POST['startingTime'], $endingTime, $_POST['dateRide'], $_POST['nbSeat']);

            }
            Redirection::redirect('./index.php?contr=user&action=show');
        }else {
            Redirection::redirect('./index.php');
        }
    }
    private function setEndingTime($duration, $startingTime){
        $timeRide = $duration;
        $timestamp = strtotime($startingTime);
        $timestamp = $timestamp + $timeRide*3600;
        $newTime = date('H:i', $timestamp);

        return $newTime;
    }
}
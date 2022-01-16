<?php

namespace Model;

require_once('./modele/Database.php');

class Ride extends \Database
{
    public function findRideByPersonId($person_id){

        $query = 'SELECT * FROM journey WHERE person_id = ? ORDER BY dateRide';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));

        $request = $stmt->fetchAll();

        return $request;

    }
    public function findRideByRideId($journey_id){
        
        $query = 'SELECT journey.*, user.*, person.person_id, person.pseudo, person.name, person.surname, person.phoneNumber FROM person INNER JOIN journey ON person.person_id = journey.person_id INNER JOIN user ON person.person_id = user.person_id WHERE journey.journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));

        $request = $stmt->fetch();

        return $request;
    }
    public function findRideByPlaceDate($startingPlace, $endingPlace, $dateRide){

        $query = 'SELECT journey.*, person.pseudo, person.person_id, user.* FROM person INNER JOIN user ON person.person_id = user.person_id INNER JOIN journey ON person.person_id = journey.person_id  WHERE journey.startingPlace = ? AND journey.endingPlace = ? AND journey.dateRide = ? ORDER BY startingTime';
        $stmt = $this->connect()->prepare($query);

        $t = $stmt->execute(array($startingPlace, $endingPlace, $dateRide));

        $request = $stmt->fetchAll();

        return $request;
    }
    public function setRide($person_id, $startingPlace, $startingPlaceLatitude, $startingPlaceLongitude, $endingPlace, $endingPlaceLatitude, $endingPlaceLongitude, $rideDistance, $rideTime, $startingTime, $endingTime, $dateRide, $nbSeat){

        $query = 'INSERT INTO journey(person_id, startingPlace, startingPlaceLatitude, startingPlaceLongitude, endingPlace, endingPlaceLatitude, endingPlaceLongitude, rideDistance, rideTime, startingTime, endingTime, dateRide, datePost, nbSeat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)';
        $stmt = $this->connect()->prepare($query);
        $msg = $stmt->execute(array($person_id, $startingPlace, $startingPlaceLatitude, $startingPlaceLongitude, $endingPlace, $endingPlaceLatitude, $endingPlaceLongitude, $rideDistance, $rideTime, $startingTime, $endingTime, $dateRide, $nbSeat));

        if($msg == true):
            return 's3';
        else:
            return 'e4';
        endif; 
    }

    public function cancelRide($journey_id){

        $query = 'DELETE FROM journey WHERE journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));
        
    }
}
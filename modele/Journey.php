<?php

namespace Model;

require_once('./modele/Database.php');

class Ride extends \Database
{
    public function findRideByPersonId($person_id){

        $query = 'SELECT * FROM journey WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));

        $request = $stmt->fetchAll();

        return $request;

    }
    public function findRideByPlaceDate($startingPlace, $endingPlace, $dateRide){

        $query = 'SELECT journey.*, person.pseudo FROM journey INNER JOIN person ON journey.person_id = person.person_id WHERE journey.startingPlace = ? AND journey.endingPlace = ? AND journey.dateRide = ? ORDER BY startingTime';
        $stmt = $this->connect()->prepare($query);

        $t = $stmt->execute(array($startingPlace, $endingPlace, $dateRide));

        $request = $stmt->fetchAll();

        return $request;
    }

    public function setRide($person_id, $startingPlace, $startingPlaceLatitude, $startingPlaceLongitude, $endingPlace, $endingPlaceLatitude, $endingPlaceLongitude, $rideDistance, $rideTime, $startingTime, $endingTime, $dateRide, $nbSeat){

        $query = 'INSERT INTO journey(person_id, startingPlace, startingPlaceLatitude, startingPlaceLongitude, endingPlace, endingPlaceLatitude, endingPlaceLongitude, rideDistance, rideTime, startingTime, endingTime, dateRide, datePost, nbSeat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id, $startingPlace, $startingPlaceLatitude, $startingPlaceLongitude, $endingPlace, $endingPlaceLatitude, $endingPlaceLongitude, $rideDistance, $rideTime, $startingTime, $endingTime, $dateRide, $nbSeat));

    }

    public function cancelRide(){

    }
}
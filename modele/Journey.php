<?php

require_once('./modele/Database.php');

class Ride extends Database
{
    public function findRideByPersonId($person_id){

        $query = 'SELECT * FROM journey WHERE person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));

        $request = $stmt->fetchAll();

        return $request;

    }

    public function setRide($startingPlace, $endingPlace, $startingTime, $endingTime){

        $query = 'INSERT INTO ride(startingPlace, endingPlace, startingTime, endingTime, datePost) VALUES(?, ?, ?, ?, NOW())';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($startingPlace, $endingPlace, $startingTime, $endingTime));

    }

    public function cancelRide(){

    }
}
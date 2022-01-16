<?php 

require_once('./modele/Database.php');


class Reservation extends DATABASE
{
    public function set($journey_id, $person_id){

        //check if there is space
        $query = 'SELECT * FROM reservation WHERE journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));
        $request = $stmt->fetchAll();

        $nbReservation = count($request);

        $query = 'SELECT nbSeat FROM journey WHERE journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));
        $request = $stmt->fetch();

        $nbSeat = $request['nbSeat'];

        if($nbReservation < $nbSeat){
            //check if the user already book
            $query = 'SELECT * FROM reservation WHERE journey_id = ? AND person_id = ?';
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($journey_id, $person_id));
            $request = $stmt->fetchAll();
    
            if(count($request) == 0){
                $query = 'INSERT INTO reservation(journey_id, person_id) VALUES(?, ?)';
                $stmt = $this->connect()->prepare($query);
                $msg = $stmt->execute(array($journey_id, $person_id));
        
                if($msg):
                    return 's4';
                else:
                    return 'e5';
                endif;       
            }else{
                return 'e6';
            }

        }else{
            return 'e7';
        }
    }

    public function getByRideId($journey_id){

        $query = 'SELECT reservation.*, person.name, person.surname, person.pseudo, user.avatar FROM reservation INNER JOIN person ON reservation.person_id = person.person_id INNER JOIN user ON reservation.person_id = user.person_id WHERE journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));

        $request = $stmt->fetchAll();

        return $request;

    }
    public function getByPersonId($person_id){
        $query = 'SELECT journey.*, reservation.reservation_id FROM journey INNER JOIN reservation ON journey.journey_id = reservation.journey_id WHERE reservation.person_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));
        $request = $stmt->fetchAll();
        
        return $request;
    }

    public function cancel($reservation_id){

        $query = 'DELETE FROM reservation WHERE reservation_id = ?';
        $stmt = $this->connect()->prepare($query);
        $msg = $stmt->execute(array($reservation_id));

        if($msg):
            return 's5';
        else:
            return 'e5';
        endif;  
    }

    public function getNbReservation($journey_id){

        $query = 'SELECT Count(journey_id) as nbReservation FROM reservation WHERE journey_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($journey_id));

        $request = $stmt->fetch();

        return $request;
    }
}

<?php

require_once('./modele/Database.php');


class Message extends Database
{
    public function set($person_id, $content, $destinataire_id){

        $query = 'INSERT INTO message(person_id, content, destinataire_id, dateSent) VALUES(?,?,?, NOW())';
        $stmt = $this->connect()->prepare($query);
        $msg = $stmt->execute(array($person_id, $content, $destinataire_id));

        if($msg):
            return 's6';
        else:
            return 'e4';
        endif;
    }

    public function getByDestinataire($destinataire_id){

        $query = 'SELECT message.*, person.name, person.surname FROM message INNER JOIN person ON message.person_id = person.person_id WHERE destinataire_id = ? AND messageDeletedDestinataire = 0';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($destinataire_id));

        $request = $stmt->fetchAll();
        return $request;
    }

    public function getBySender($person_id){
        
        $query = 'SELECT message.*, person.name, person.surname FROM message INNER JOIN person ON message.destinataire_id = person.person_id WHERE message.person_id = ? AND messageDeletedSender = 0';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($person_id));

        $request = $stmt->fetchAll();
        return $request;
    }

    public function updateReport($message_id){

        $query = 'UPDATE message SET report = 1 WHERE message_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($message_id));

    }

    public function deleteDestinataireMessage($message_id){

        $query = 'UPDATE message SET messageDeletedDestinataire = 1 WHERE message_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($message_id));

    }

    public function deleteSenderMessage($message_id){

        $query = 'UPDATE message SET messageDeletedSender = 1 WHERE message_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($message_id));

    }
}
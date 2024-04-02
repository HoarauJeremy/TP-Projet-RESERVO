<?php

namespace Models;
use PDO;

class Utilisateur extends Model
{
    
    public function __construct() {
        parent::__construct();
    }

    public function insertUtilisateur(array $data) {
        try {
            $sql = 'INSERT INTO utilisateur (nom, prenom, telephone, courriel) VALUES (:nom, :prenom, :telephone, :courriel);';
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindValue(':nom', $data[0], PDO::PARAM_STR);
            $rqt->bindValue(':prenom', $data[1], PDO::PARAM_STR);
            $rqt->bindValue(':telephone', $data[2], PDO::PARAM_STR);
            $rqt->bindValue(':courriel', $data[3], PDO::PARAM_STR);
            $rqt->execute();
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

}

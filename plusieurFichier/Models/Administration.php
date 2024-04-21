<?php

    namespace Models;
    use PDO;

    class Administration extends Model
    {

        function __construct() {
            parent::__construct();
        }

        public function getReservations() {
            try {
                $sql = "SELECT r.*, CONCAT(u.nom, ' ',  u.prenom) as 'utilisateur' FROM reservation r INNER JOIN utilisateur u ON r.idUtilisateur = u.idUtilisateur;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $reservation = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();           
                return $reservation;
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }

        public function getReservation($idReservation) {
            try {
                $sql = "SELECT r.*, CONCAT(u.nom, ' ',  u.prenom) as 'utilisateur' FROM reservation r INNER JOIN utilisateur u ON r.idUtilisateur = u.idUtilisateur WHERE r.idReservation = :idReservation;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(":idReservation", $idReservation);
                $rqt->execute();
                $reservation = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();           
                return $reservation;
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }

        public function deleteReservation($idReservation) {
            try {
                $sql = "DELETE FROM reservation WHERE idReservation = :idReservation";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(":idReservation", $idReservation);
                $rqt->execute();
                $rqt->closeCursor();
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }

    }

    class AdministrationData 
    {
        public $idReservation;
        public $dateReservation;
        public $heureDebutReservation;
        public $heureFinReservation;
        public $prixTotal;
        public $utilisateur;
        
        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

		public function hydrate(array $donnees) {
			foreach ($donnees as $key => $value) {
				$method = 'set'.ucfirst($key);
				if (method_exists($this, $method)) {
					$this->$method($value);
				}
			}
		}

        // GETTER
        public function getIdReservation() {
            return $this->idReservation;
        }

        public function getDateReservation() {
            return $this->dateReservation;
        }

        public function getHeureDebutReservation() {
            return $this->heureDebutReservation;
        }

        public function getHeureFinReservation() {
            return $this->heureFinReservation;
        }

        public function getPrixTotal() {
            return $this->prixTotal;
        }

        public function getUtilisateur() {
            return $this->utilisateur;
        }

        // SETTER
		public function setIdReservation($IdReservation) {
            $this->idReservation = $IdReservation;
        }

        public function setDateReservation($DateReservation) {
            $this->dateReservation = $DateReservation;
        }

        public function setHeureDebutReservation($HeureDebuteReservation) {
            $this->heureDebutReservation = $HeureDebuteReservation;
        }

        public function setHeureFinReservation($HeureFinReservation) {
            $this->heureFinReservation = $HeureFinReservation;
        }

        public function setPrixTotal($PrixTotal) {
            $this->prixTotal = $PrixTotal;
        }
        
        public function setUtilisateur($Utilisateur) {
            $this->utilisateur = $Utilisateur;
        }
    }
    
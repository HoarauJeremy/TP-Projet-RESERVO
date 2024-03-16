<?php

    class connexion_DB
    {
        protected $host;
        protected $port;
        protected $dbname;
        protected $user;
        protected $passwd;
        protected $sgbd;
        protected $cnx;

        public function __construct() {
            $this->host   = "localhost";     // Hôte de la base de donnée
            $this->port   = 3306;                                           // Port
            $this->dbname = "reservo";                       // Nom de la BD            
            $this->user   = 'jeremy';                                          // Utilisateur
            $this->passwd = "jeremy";
            $this->sgbd   = "mysql";                                        // Server de Gestion de Base de donnée

            $this->cnx = null;                                              // Initialisation de la connexion à NULL

            $this->getConnection(); 
        }

        /**
         * Crée une connexion avec la base de donnée. 
         * 
         * @param connexion_DB $cnx Renvoie la connexion a la base de donnée
         */
        public function getConnection() {
            // on ferme la connexion précédente
            $this->fermerConnexion();

            // On essaie de se connecter à la base
            try{
                $this->cnx = new PDO($this->sgbd.":host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
                $this->cnx->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connexion à la base de données impossible : " . $exception->getMessage();
            }
            
            return $this->cnx;
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
                throw $exception;
            }
        }

        public function insertReservation(array $data) {
            try {
                $sql = 'INSERT INTO reservation (dateReservation, heureDebutReservation, heureFinReservation, prixTotal, idUtilisateur) VALUES (:dateReservation, :heureDebutReservation, :heureFinReservation, :prixTotal, :idUtilisateur);';
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(':dateReservation', $data[0]);
                $rqt->bindValue(':heureDebutReservation', $data[1]);
                $rqt->bindValue(':heureFinReservation', $data[2]);
                $rqt->bindValue(':prixTotal', $data[3], PDO::PARAM_INT);
                
                $rqt->bindValue(':idUtilisateur', $this->getIdUtilisateur(), PDO::PARAM_INT);

                $rqt->execute();
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                throw $exception;
            }
        }

        public function insertSalleReservee(array $data) {
            try {
                $sql = 'INSERT INTO salle_reservee (idReservation, idSalle) VALUES (:idReservation, :idSalle);';
                $rqt = $this->cnx->prepare($sql);
                
                foreach ($data as $salle) {
                    if ($salle) {
                        $rqt->bindValue(':idReservation', $this->getIdReservation(), PDO::PARAM_INT);
                        $rqt->bindValue(':idSalle', $salle, PDO::PARAM_INT);
                        $rqt->execute();
                        $rqt->closeCursor();
                    }
                }
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                throw $exception;
            }
        }

        public function insertEquipementReservee(array $data) {            
            try {
                $sql = 'INSERT INTO equipement_reservee (idReservation, idEquipement, quantite) VALUES (:idReservation, :idEquipement, :quantite);';
                $rqt = $this->cnx->prepare($sql);

                foreach ($data as $equipement => $quantite) {
                    if ($equipement && $quantite) {                        
                        $rqt->bindValue(':idReservation', $this->getIdReservation(), PDO::PARAM_INT);
                        $rqt->bindValue(':idEquipement', $equipement, PDO::PARAM_INT);
                        $rqt->bindValue(':quantite', $quantite, PDO::PARAM_INT);
                        $rqt->execute();
                        $rqt->closeCursor();
                    }
                }
                
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                throw $exception;
            }
        }

        public function insertServiceReservee(array $data) {
            try {
                $sql = 'INSERT INTO service_reservee (idReservation, idService) VALUES (:idReservation, :idService);';
                $rqt = $this->cnx->prepare($sql);
                
                foreach ($data as $service) {
                    if ($service) {        
                        $rqt->bindValue(':idReservation', $this->getIdReservation(), PDO::PARAM_INT);
                        $rqt->bindValue(':idService', $service, PDO::PARAM_INT);
                        $rqt->execute();
                        $rqt->closeCursor();
                    }
                }
                
                $rqt->closeCursor();
            } catch (\Exception $e) {
                throw $e;
            }
        }

        private function getIdUtilisateur() {
            try {
                $sql = "SELECT idUtilisateur FROM utilisateur ORDER BY idUtilisateur DESC LIMIT 1;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $id = $rqt->fetch(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $id['idUtilisateur'];
            } catch (\Exception $e) {
                throw $e;
            }
        }

        /**
         * 
         */
        private function getIdReservation() {
            try {
                $sql = "SELECT idReservation FROM reservation ORDER BY idReservation DESC LIMIT 1;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $id = $rqt->fetch(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $id['idReservation'];
            } catch (\Exception $e) {
                throw $e;
            }
        }
        
        /**
         * Function pour fermer la connexion avec la base de donnée.
         */
        public function fermerConnexion() 
        {
            $this->cnx = null;
        }
    }
    
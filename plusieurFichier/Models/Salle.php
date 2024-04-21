<?php

    namespace Models;
    use PDO;

    class Salle extends Model
    {
        function __construct() {
            parent::__construct();
        }

        public function getSalles() {
            try {
                $sql = "SELECT * FROM salle;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $salles = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $salles;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

    }
    

    class SalleData
    {
        public $idSalle;
        public $nom;
        public $prix;

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
        public function getIdSalle() {
            return $this->idSalle;
        }

        public function getNom() {
            return $this->nom;
        }
        
        public function getPrix() {
            return $this->prix;
        }

        // SETTER
		public function setIdSalle($IdSalle) {
            $this->idSalle = $IdSalle;
        }

		public function setNom($nom) {
            $this->nom = $nom;
        }

        public function setPrix($prix) {
            $this->prix = $prix;
        }
    }
    

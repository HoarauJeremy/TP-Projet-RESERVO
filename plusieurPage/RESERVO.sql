DROP DATABASE IF EXISTS `RESERVO`;

CREATE DATABASE `RESERVO` DEFAULT CHARACTER SET = 'utf8mb4';

USE `RESERVO`;

CREATE TABLE utilisateur(
    idUtilisateur INT AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    courriel VARCHAR(255) NOT NULL,
    PRIMARY KEY(idUtilisateur),
    UNIQUE(courriel),
    UNIQUE(telephone)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE reservation(
    idReservation INT AUTO_INCREMENT,
    dateReservation DATE NOT NULL,
    heureDebutReservation TIME NOT NULL,
    heureFinReservation TIME NOT NULL,
    prixTotal INT NOT NULL,
    idUtilisateur INT NOT NULL,
    PRIMARY KEY(idReservation),
    FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE salle(
    idSalle INT AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prix INT NOT NULL,
    PRIMARY KEY(idSalle)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE equipement(
    idEquipement INT AUTO_INCREMENT,
    nom VARCHAR(150) NOT NULL,
    prix INT NOT NULL,
    PRIMARY KEY(idEquipement)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE service(
    idService INT AUTO_INCREMENT,
    nom VARCHAR(150) NOT NULL,
    prix INT NOT NULL,
    PRIMARY KEY(idService)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE salle_reservee(
    idReservation INT,
    idSalle INT,
    PRIMARY KEY(idReservation, idSalle),
    FOREIGN KEY(idReservation) REFERENCES reservation(idReservation),
    FOREIGN KEY(idSalle) REFERENCES salle(idSalle)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE equipement_reservee(
    idReservation INT,
    idEquipement INT,
    quantite INT,
    PRIMARY KEY(idReservation, idEquipement),
    FOREIGN KEY(idReservation) REFERENCES reservation(idReservation),
    FOREIGN KEY(idEquipement) REFERENCES equipement(idEquipement)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE service_reservee(
    idReservation INT,
    idService INT,
    PRIMARY KEY(idReservation, idService),
    FOREIGN KEY(idReservation) REFERENCES reservation(idReservation),
    FOREIGN KEY(idService) REFERENCES service(idService)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

INSERT INTO salle (nom, prix) VALUES
    ("Préau", 50),
    ("Terrain", 100),
    ("Salle 1", 100),
    ("Salle 2", 100),
    ("Centre culturel 1", 150),
    ("Centre culturel 2", 150);

INSERT INTO equipement (nom, prix) VALUES
    ("Table", 8),
    ("Chaise", 2),
    ("Matériel de sonorisation", 75),
    ("Chapiteau 3x3m", 100),
    ("Chapiteau 3x4m", 130),
    ("Chapiteau 3x6m", 180);

INSERT INTO service(nom, prix) VALUES
    ("Mise en place", 150),
    ("Nettoyage et Rangement", 250);
DROP DATABASE if EXISTS garage_slam_jv_23;

CREATE DATABASE garage_slam_jv_23;

use garage_slam_jv_23;

CREATE TABLE
    client(
        idclient int(3) NOT NULL AUTO_INCREMENT,
        nom varchar(50) DEFAULT NULL,
        prenom varchar(50) DEFAULT NULL,
        adresse varchar(100) DEFAULT NULL,
        email varchar(50) DEFAULT NULL,
        tel varchar(20) DEFAULT NULL,
        PRIMARY KEY (idclient)
    ) ENGINE = INNODB;

CREATE TABLE
    technicien(
        idtechnicien int(3) NOT NULL AUTO_INCREMENT,
        nom varchar(50) DEFAULT NULL,
        prenom varchar(50) DEFAULT NULL,
        qualification varchar(100) DEFAULT NULL,
        email varchar(50) DEFAULT NULL,
        tel varchar(20) DEFAULT NULL,
        PRIMARY KEY (idtechnicien)
    ) ENGINE = INNODB;

CREATE TABLE
    vehicule(
        idvehicule int(3) NOT NULL AUTO_INCREMENT,
        matricule varchar(50) DEFAULT NULL,
        marque varchar(50) DEFAULT NULL,
        nbkm int(10) DEFAULT NULL,
        energie varchar(50) DEFAULT NULL,
        idclient int(3) NOT NULL,
        PRIMARY KEY (idvehicule),
        FOREIGN KEY (idclient) REFERENCES client(idclient) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = INNODB;

CREATE TABLE
    intervention(
        idintervention int(3) NOT NULL AUTO_INCREMENT,
        dateinter date DEFAULT NULL,
        heure time DEFAULT NULL,
        prix float DEFAULT NULL,
        description varchar(100) DEFAULT NULL,
        idvehicule int(3) NOT NULL,
        idtechnicien int(3) NOT NULL,
        PRIMARY KEY (idintervention),
        FOREIGN KEY (idvehicule) REFERENCES vehicule(idvehicule) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (idtechnicien) REFERENCES technicien(idtechnicien) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = INNODB;

CREATE Table
    user(
        iduser int(3) not null AUTO_INCREMENT,
        nom VARCHAR(50),
        prenom VARCHAR(50),
        email VARCHAR(50),
        mdp VARCHAR(50),
        role enum("admin", "user"),
        PRIMARY KEY(iduser)
    );

INSERT into user
VALUES (
        null,
        "Laurent",
        "Alexys",
        "alexyszozo@gmail.com",
        "123",
        "admin"
    ), (
        null,
        "Shariff",
        "Dylan",
        "b@gmail.com",
        "456",
        "user"
    );
CREATE VIEW
    vehiculesInterventions as (
       select DISTINCT c.nom,
        (select DISTINCT group_concat(matricule separator "  &  ") from vehicule where idclient = c.idclient) as matricule,
        count(idintervention) as nb
        from client c,vehicule v,intervention i where c.idclient=v.idclient and i.idvehicule = v.idvehicule GROUP BY c.idclient
);

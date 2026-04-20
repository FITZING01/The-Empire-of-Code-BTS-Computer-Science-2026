-- LEVEL 1 : SCHEMA.SQL - UPDATED 20/04/2026
DROP DATABASE IF EXISTS bts_niveau1;
CREATE DATABASE bts_niveau1;
USE bts_niveau1;
CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    ville VARCHAR(50)
) ENGINE=InnoDB;
INSERT INTO client (nom, prenom, email, ville) VALUES ('Dupont','Jean','jean@mail.com','Paris'),('Martin','Sophie','sophie@mail.com','Lyon');

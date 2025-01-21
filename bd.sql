
CREATE DATABASE AgenceLocationVoitures;


USE AgenceLocationVoitures;


CREATE TABLE voiture (
    matricule VARCHAR(20) PRIMARY KEY,
    marque VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL, 
    photo VARCHAR(255),         
    annee_de_fabrication YEAR NOT NULL
);


CREATE TABLE clients (
    num_permit VARCHAR(20) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    adresse VARCHAR(255) NOT NULL
);


CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Ajout d'une clé primaire pour la table
    matricule VARCHAR(20) NOT NULL,
    num_permit VARCHAR(20) NOT NULL,
    date_com DATE NOT NULL,
    date_fin DATE NOT NULL,
    FOREIGN KEY (matricule) REFERENCES voiture(matricule) ON DELETE CASCADE,
    FOREIGN KEY (num_permit) REFERENCES clients(num_permit) ON DELETE CASCADE
);

-- Créer la base de données si elle n'existe pas déjà
CREATE DATABASE IF NOT EXISTS arcadia_zoo_db;

-- Utiliser la base de données créée
USE arcadia_zoo_db;

-- Supprimer l'utilisateur s'il existe déjà (pour éviter les conflits)
DROP USER IF EXISTS 'arcadiaUser'@'%';

-- Créer un utilisateur pour gérer la base de données
CREATE USER 'arcadiaUser'@'%' IDENTIFIED BY 'Password';

-- Accorder tous les privilèges à cet utilisateur sur la base arcadia_zoo_db
GRANT ALL PRIVILEGES ON arcadia_zoo_db.* TO 'arcadiaUser'@'%' WITH GRANT OPTION;

-- Appliquer les changements de privilèges
FLUSH PRIVILEGES;

-- Supprimer les tables si elles existent pour éviter les erreurs
DROP TABLE IF EXISTS habitats;
DROP TABLE IF EXISTS images;

-- Création de la table images
CREATE TABLE images (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    path_img VARCHAR(255) NOT NULL,
    description_img TEXT
);

-- Création de la table habitats 
CREATE TABLE habitats (
    id_habitats INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    id_image INT,
    CONSTRAINT fk_habitat_image
    FOREIGN KEY (id_image)
    REFERENCES images(id_image)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

-- Insertion des données de test dans la table images
INSERT INTO images (path_img, description_img) VALUES
('assets/img/originals/habitats/savane-one.jpg', 'Image savane'),
('assets/img/originals/habitats/jungle.jpg', 'Image jungle'),
('assets/img/originals/habitats/marais.jpg', 'Image marais');

-- Insertion des données de test dans la table habitats 
INSERT INTO habitats (nom, description, id_image) VALUES
('Savane', 'Habitat pour les lions', 1),
('Jungle', 'Habitat pour les tigres', 2),
('Marais', 'Habitat pour les crocodiles', 3);

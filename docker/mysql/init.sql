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

-- Création de la table des habitats
CREATE TABLE IF NOT EXISTS habitats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  description TEXT,
  etat VARCHAR(100)
);

-- Insertion des données de test dans la table habitats
INSERT IGNORE INTO habitats (nom, description, etat) VALUES
('Savane', 'Habitat pour les lions', 'bien'),
('Jungle', 'Habitat pour les tigres', 'pas bien '),
('Océan', 'Habitat pour les dauphins', 'bien');
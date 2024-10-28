<?php

// //importer les constantes globales
require_once __DIR__. '/../src/config/constantes.php';
require_once __DIR__ . '/../vendor/autoload.php';

//charger les variables dans le fichier .env 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './../../');
$dotenv->load();

// Test : Vérifier si la variable d'environnement est bien chargée
echo "Nom de l'application : " . $_ENV['APP_ENV'] .  "<br>";
echo ROOT_PATH ."<br>";
var_dump($dotenv);



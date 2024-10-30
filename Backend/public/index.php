<?php

// //importer les constantes globales

use App\Router\Router;

require_once __DIR__. '/../src/config/constantes.php';
require_once __DIR__ . '/../vendor/autoload.php';

//charger les variables dans le fichier .env 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './../../');
$dotenv->load();

// Test : Vérifier si la variable d'environnement est bien chargée
// echo "Nom de l'application : " . $_ENV['APP_ENV'] .  "<br>";
// echo ROOT_PATH ."<br>";
// echo UPLOADS_PATH ."<br>";
// echo ORIGINALS_PATH ."<br>";

$router = new Router();
$router->dispatch();


<?php

namespace App\Config;

use Exception;
use PDO;
use PDOException;

/**
 * class singleton pour gestion connexion db
 */
class Database
{

    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host = 'my-mysql-container';
        $db = 'arcadia_zoo_db';
        $user = 'root';
        $pass = 'RootRoot@1809';
        $charset = 'utf8mb4';

        $dns = "mysql:host=$host;dbname=$db;charset=$charset";

        /** Options pour configurer le comportement de PDO**/
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
    
        // Tentative de connexion à la base de données via PDO
        try {
            $this->connection = new PDO($dns, $user, $pass, $options);
           
        //si connexion echoue on personnalise le message et on capture l'erreur
        } catch (\PDOException $e) {
            throw new Exception('Problème de connexion à la base de données : ' . $e->getMessage(), (int)$e->getCode());
        }  
    }

    /**
     * retourne instance unique de la connexion de la PDO
     *
     * @return PDO
     */
    public static function getConnection() {
        if (self::$instance === null) {
           self::$instance = new self;
        }
        return self::$instance->connection;
    }
}

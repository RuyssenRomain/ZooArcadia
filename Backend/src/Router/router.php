<?php

namespace App\Router;

use AltoRouter;

/**
 * class qui gère le routage de l'application
 */
class Router
{
    private $router;

    /**
     * Constructeur de la classe Router.
     * Initialise l'instance d'AltoRouter et charge les définitions de routes.
     */
    public function __construct()
    {
        $this->router = new AltoRouter();
        $this->loadRoutes();
    }


    /**
     * loadRoutes : Permet de charger les routes
     *  et de capturer l'instance de rooter (evite le $this->router->map = écris maintenat $router->map).
     *
     * @return void
     */
    private function loadRoutes(): void
    {

        $router = $this->router;
        require ROOT_PATH . '/Backend/src/Router/routes/api.php';
    }
    /**
     * trouve la correspondance à la requète actuelle
     *
     * @return array|false si true => retourne un tableau des informations de la correpondance et sinon false
     */
    public function match(): mixed
    {
        return $this->router->match();
    }


    /**
     * 
     *
     * @return void
     */
    public function dispatch(): void
    {
        //Appel de la fonction match pour trouver une route
        $match = $this->match();

        //si une correspondance est trouvé
        if ($match) {
            // On découpe la chaîne 'Controller#method' en deux parties : le contrôleur et la méthode
            list($controller, $method) = explode('#', $match['target']);

            //Prépare le nom complet du contrôleur avec son espace de noms
            $controller = 'App\\Controllers\\' . $controller;

            // on vérifie si la classe du controlleur existe
            if (class_exists($controller)) {
                $controllerInstance = new $controller();

                //on vérifie si une méthode éxiste
                if (method_exists($controllerInstance, $method)) {

                    //on appel la méthode avec les parametres de la routes 
                    call_user_func_array([$controllerInstance, $method], $match['params']);
                } else {
                    echo 'méthode non trouvée';
                }
            } else {
                echo 'controlleur non trouvé';
            }
        } else {
            //aucune correspondances de trouvé, affiche message 
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            echo "Page non trouvée.";
        }
    }
}

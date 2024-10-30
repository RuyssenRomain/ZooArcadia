<?php

namespace App\controllers;

use App\Repositories\HabitatRepository;

class HabitatsController
{
    private $habitatRepository;

    public function __construct()
    {
        $this->habitatRepository = new HabitatRepository();
    }

        
    /**
     * index renvoi tout les habitats avec leur images en json.
     *
     * @return void
     */
    public function index() {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(204);
            exit;
        }

        $habitats = $this->habitatRepository->getAll();
        $habitatsArray = array_map(function($habitat) {
            return [
                'id' => $habitat->getId(),
                'nom' => $habitat->getNom(),
                'description' => $habitat->getDescription(),
                'image' => [
                    'id' => $habitat->getImage()->getId(),
                    'path' => $habitat->getImage()->getPath(),
                    'description' => $habitat->getImage()->getDescription()
                ]
            ];
        }, $habitats);
        echo json_encode($habitatsArray);
    }

}
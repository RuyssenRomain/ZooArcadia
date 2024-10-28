<?php

namespace App\controllers;

class HabitatsController
{
    public function index() {

        // Données pour test routeur .
        
        $habitats = [
            [
                'id' => '1',
                'name' => 'Savane',
                'description' => 'joli petite savane'
            ],

            [
                'id' => '2',
                'name' => 'Marais',
                'description' => 'Attention au crocodiles'
            ]
        ];

        header('content-type: application/json');
        echo json_encode($habitats);
    }

}
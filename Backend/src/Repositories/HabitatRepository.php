<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Habitat;
use App\Entities\Image;
use App\Utils\Hydrator;
use PDO;

class HabitatRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Récupère tous les habitats avec leurs images associées.
     *
     * @return array
     */
    public function getAll(): array
    {
        $query = "
        SELECT h.id_habitats, h.nom, h.description, i.id_image, i.path_img AS image_path, i.description_img AS image_description
        FROM habitats h
        LEFT JOIN images i ON h.id_image = i.id_image
    ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $habitats = [];
        foreach ($results as $result) {
            // Hydrate le habitat
            $habitat = Hydrator::createAndHydrate(Habitat::class, $result);

            // Hydrate l'objet Image associé, si les données d'image existent
            $image = Hydrator::hydrateImage($result);
            if ($image) {
                $habitat->setImage($image);
            }

            $habitats[] = $habitat;
        }

        return $habitats;
    }
}

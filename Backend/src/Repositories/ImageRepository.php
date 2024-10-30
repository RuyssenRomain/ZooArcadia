<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Image;
use App\Utils\Hydrator;
use PDO;

class ImageRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Récupère une image par son ID.
     *
     * @param int $id
     * @return Image|null
     */
    public function getById(int $id): ?Image
    {
        $query = "SELECT * FROM images WHERE id_image = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return Hydrator::createAndHydrate(Image::class, $result);
        }

        return null;
    }
}

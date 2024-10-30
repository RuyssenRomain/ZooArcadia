<?php

namespace App\Utils;

use App\Entities\Image;

class Hydrator
{
    /**
     * Crée une instance d'une classe et l'hydrate avec des données
     *
     * @param string $className Nom de la classe à instancier
     * @param array $data Données pour hydrater l'objet
     * @return object Instance de la classe hydratée
     */
    public static function createAndHydrate(string $className, array $data): object
    {
        $entity = new $className();
        self::hydrate($entity, $data);
        return $entity;
    }

    /**
     * Hydrate un objet en utilisant les setters correspondants
     *
     * @param object $entity Objet à hydrater
     * @param array $data Données pour l'hydratation
     */
    public static function hydrate(object $entity, array $data): void
    {
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                // $methodName = 'set' . ucfirst($key);
                $methodName = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                if (method_exists($entity, $methodName)) {
                    $entity->$methodName($value);
                }
            }
        }
    }

        
    /**
     * hydrateImage permet d'hydrater objet image si des valeurs sont rpeésentes
     *
     * @param  mixed $data
     * @return object
     */
    public static function hydrateImage(array $data): ?object
    {
        if (!isset($data['image_path']) || !isset($data['image_description'])) {
            return null;
        }

        $image = new Image();

        if (isset($data['id_image'])) {
            $image->setIdImage($data['id_image']);
        }
        $image->setPath($data['image_path']);
        $image->setDescription($data['image_description']);
        return $image;
    }

}

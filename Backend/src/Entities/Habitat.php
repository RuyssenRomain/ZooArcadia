<?php

namespace App\Entities;

class Habitat
{
    /**
     * id_habitats
     *
     * @var mixed
     */
    private $id_habitats;
    private $nom;
    private $description;
    private $image;



    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id_habitats;
    }

    /**
     * Set the value of id_habitats
     *
     * @param int $id
     * @return self
     */
    public function setIdHabitats(int $id): self
    {
        $this->id_habitats = $id;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }
}

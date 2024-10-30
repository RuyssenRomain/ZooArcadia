<?php

namespace App\Entities;

class Image
{
    private $id_image;
    private $path_img;
    private $description_img;


    //getter and setter
    public function getId(): ?int
    {
        return $this->id_image;
    }

    public function setIdImage(int $id_image): self
    {
        $this->id_image = $id_image;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path_img;
    }

    public function setPath(string $path): void
    {
        $this->path_img = $path;
    }

    public function getDescription(): ?string
    {
        return $this->description_img;
    }

    public function setDescription(?string $description): void
    {
        $this->description_img = $description;
    }

}

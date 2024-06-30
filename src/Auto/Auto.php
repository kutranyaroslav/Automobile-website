<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

class Auto
{
    private $id;
    private $name;
    private $description;
    private $image;
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}
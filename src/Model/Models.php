<?php

namespace App\Model;

class Models
{
    public function __construct(private int $id, private string $name,
        private string $brand,
        private string $model, private string $status)
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

}

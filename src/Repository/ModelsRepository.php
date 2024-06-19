<?php

namespace App\Repository;

use App\Model\Models;
use Psr\Log\LoggerInterface;

class ModelsRepository
{
    public function __construct(private LoggerInterface $logger)
    {
        $this->logger = $this->logger;
    }

    public function FindAll(): array
    {
        $this->logger->info('Cars collection retrieved');

        return [new Models(1, 'Toyota Corolla', 'Toyota', 'Corolla', 'used'),
            new Models(2, 'BMW X3', 'BMW', 'X3', 'used'),
            new Models(3, 'Mercedes-benz C-CLASS', 'Mercedes-benz', 'C-CLASS', 'used')];
    }

    public function find(int $id): ?Models
    {
        foreach ($this->FindAll() as $model) {
            if ($model->getId() === $id) {
                return $model;
            }
        }
        return null;
    }
}

<?php

namespace App\Controller;

use App\Model\Models;
use App\Repository\ModelsRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route ('/api/avto24', methods: ['GET'])]
    public function getCollection( ModelsRepository $repository):Response
    {
        $avto24 = $repository->FindAll();
        return $this->json($avto24);
    }
    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function getModel(int $id, ModelsRepository $modelsRepository): Response
    {
        $model = $modelsRepository->find($id);
        if(!$model){
            throw $this->createNotFoundException('Model not found');
        }
        return $this->json($model);

    }
}
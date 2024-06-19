<?php

namespace App\Controller;

use App\Repository\ModelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class ModelsController extends AbstractController
{
    #[Route('/models/{id<\d>}', name: 'app_models_show')]
    public function show (int $id,ModelsRepository $modelsRepository ):Response
    {
        $model = $modelsRepository->find($id);
        if(!$model){
            throw $this->createNotFoundException('We do not have such model');
        }
        return $this->render('models/show.html.twig',['model'=>$model]);
    }

}
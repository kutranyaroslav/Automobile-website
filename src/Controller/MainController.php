<?php

namespace App\Controller;
use App\Repository\ModelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
    #[Route('/')]
    public function homepage(ModelsRepository $modelsRepository): Response
    {
        $models = $modelsRepository->FindAll();
        $models_count = count($models);
        $random_choice = $models[array_rand($models)];
        return $this->render('main/homepage.html.twig', ['models_count'=>$models_count, 'random_choice' =>$random_choice,]);
    }
}
<?php

namespace App\Controller;
use App\Repository\AutoRepository;
use App\Repository\ModelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
    #[Route('/')]
    public function homepage(): Response
    {

        return $this->render('main/homepage.html.twig');
    }
}
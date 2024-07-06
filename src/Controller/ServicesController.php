<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ServicesController extends AbstractController
{
    #[Route('/services', name: 'show_services')]
    public  function show_services():Response
    {
        return $this->render('models/services.html.twig');
    }

}
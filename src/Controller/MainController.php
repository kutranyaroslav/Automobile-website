<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('<Strong>Avto24</Strong>: You in the right place to buy your car ');
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class LoginController extends AbstractController
{
    #[Route('/login/', name: "logincontroller")]
    public function LoginFormRender():Response
    {
        return $this->render("models/login.html.twig", []);

    }

}
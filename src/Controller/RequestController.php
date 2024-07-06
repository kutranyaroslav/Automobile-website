<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class RequestController extends AbstractController
{
    #[Route('/success/{firstname}', name: 'success')]
    public function RequestAnswer(Request $request,string $firstname)
    {
        return $this->render('support/success.html.twig',['firstname'=>$firstname]);

    }


}
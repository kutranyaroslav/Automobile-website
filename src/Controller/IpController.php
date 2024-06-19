<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IpController extends AbstractController
{
    #[Route('/showip', name: 'show_ip')]
    public function ShowIp():Response
    {
        $ip_address = $_SERVER['SERVER_ADDR'];
        return new Response(sprintf('IP address of the server: %s', $ip_address));

    }

}
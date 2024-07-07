<?php

namespace App\Controller;

use App\Repository\CarRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CarController extends AbstractController
{
    private $car_repository;

    public function __construct(CarRepository $CarRepository)
    {
        $this->car_repository = $CarRepository;
    }
    #[Route('/cars/{mark}', name: 'car_render')]
    public function Show_car(Request $request, string $mark):Response
    {
        $cars_sorted = $this->car_repository->findBy(['mark'=>$mark]);
        return $this->render('models/cars.html.twig',['cars_sorted'=>$cars_sorted,'mark'=>$mark, ]);

    }

}
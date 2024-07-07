<?php
namespace App\Controller;

use App\Repository\CarRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CarRenderController extends AbstractController
{
    private $car_repository;
    public function __construct(CarRepository $car_repository ){
        $this->car_repository = $car_repository;
    }
    #[Route('/car/{id}', name: 'render_car')]
    public function render_car(int $id):Response
    {
        $car =$this->car_repository->find($id);
        return $this->render('models/car.html.twig',['car'=>$car]);
    }

}
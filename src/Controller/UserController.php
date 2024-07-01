<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\throwException;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    #[Route('/user/{id}', name: 'user_show', requirements: ['id' => '\d+'])]
    public function show(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);

        if ($user) {
            return $this->render('models/profile.html.twig', [
                'user_email' => $user->getEmail(),
                'user_password' => $user->getPassword(),
                'user_id' => $user->getId()
            ]);
        } else {
            throw $this->createNotFoundException('The user does not exist');
        }
    }
}
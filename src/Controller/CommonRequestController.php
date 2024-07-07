<?php
namespace App\Controller;

use App\Form\CommonRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\SupportType;
use App\Entity\CommonRequest;
use Doctrine\ORM\EntityManagerInterface;

class CommonRequestController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/services/{type}', name: 'commonrequest')]
    public function common_request_form(string $type, Request $request): Response
    {
        $CommonRequest = new CommonRequest();
        $form = $this->createForm(CommonRequestType::class, $CommonRequest);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g., save to database
            $this->entityManager->persist($CommonRequest);
            $this->entityManager->flush();

            return $this->redirectToRoute('success', ['firstname' => $CommonRequest->getFirstname()]);
            // Add flash message or redirect as needed
        }

        return $this->render('support/support.html.twig', [
            'supportForm' => $form->createView(), 'message'=>$type
        ]);
    }
}

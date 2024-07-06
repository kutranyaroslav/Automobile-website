<?php

namespace App\Controller;

use App\Entity\SupportRequest;
use App\Form\SupportType;
use App\MailjetService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupportController extends AbstractController
{
    private $mailjetService;
    private $logger;
    private $entityManager;

    public function __construct(MailjetService $mailjetService, LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        $this->mailjetService = $mailjetService;
        $this->logger = $logger;
        $this->entityManager = $entityManager;
    }

    #[Route('/support', name: 'app_support')]
    public function support_form_call(Request $request): Response
    {
        $supportRequest = new SupportRequest();
        $form = $this->createForm(SupportType::class, $supportRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Send email
            $subject = 'Support Request Received';
            $htmlContent = $this->renderView('emails/support.html.twig', ['data' => $data]);
            $textContent = strip_tags($htmlContent);

            $response = $this->mailjetService->SendEmail($supportRequest->getEmail(), $subject, $htmlContent, $textContent);

            if (!$response->success()) {
                $this->logger->error('Mailjet failed to send email.', ['response' => $response->getData()]);

                return new Response('Error: '.$response->getReasonPhrase());
            }

            $this->logger->info('Support request submitted successfully. Email sent.', ['data' => $data]);
            $this->entityManager->persist($supportRequest);
            $this->entityManager->flush();

            return $this->redirectToRoute('success', ['firstname' => $supportRequest->getFirstname()]);
        }

        return $this->render('support/support.html.twig', [
            'supportForm' => $form->createView(),
        ]);
    }
}

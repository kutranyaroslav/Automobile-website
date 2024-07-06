<?php

namespace App;
use \Mailjet\Resources;
use Mailjet\Client;
use Psr\Log\LoggerInterface;

class MailjetService
{
    private $client;
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $api_key = $_ENV['MAILJET_API_KEY'];
        $api_secret = $_ENV['MAILJET_API_SECRET'];
        $this->client = new Client($api_key, $api_secret, true, ['version' => 'v3.1']);
        $this->logger = $logger;
    }
    public  function SendEmail($to, $subject,$html, $textcontent)
    {
        $fromEmail = 'sandbox@yourdomain.com';
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $fromEmail,
                        'Name' => "Your Name"
                    ],
                    'To' => [
                        [
                            'Email' => $to,
                            'Name' => "Recipient Name"
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => $textcontent,
                    'HTMLPart' => $html,
                ]
            ]
        ];
        $response = $this->client->post(Resources::$Email,['body'=>$body]);
        if ($response->success()) {
            $this->logger->info('Email sent successfully');
        } else {
            $this->logger->error('Failed to send email', [
                'status' => $response->getStatus(),
                'reason' => $response->getReasonPhrase(),
                'data' => $response->getData(),
            ]);
        }

        return $response;
    }

}
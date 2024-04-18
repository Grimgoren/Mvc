<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
    #[Route("/api")]
    public function apiRoutes(): Response
    {
        $data = [
            'routes' => [
                'me (me page)' => '/',
                'about (about the course page' => '/about',
                'report (student report page)' => '/report',
                'lucky (lucky number page)' => '/lucky',
                'lucky_pretty_print (lucky number in json format)' => '/api/lucky/number',
                'quote (random quote in json format)' => '/api/quote',
                'session (shows what is in the session in json format)' => '/api/session',
                'delete session (deletes the current information in the session)' => '/delete'
            ]
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
    #[Route("/api/quote")]
    public function apiQuote(): Response
    {
        $number = random_int(0, 2);

        $t = time();
        $time = date("Y-m-d H:i:s", $t);

        $data = [];

        if ($number === 0) {
            $data = [
                'Quote 1' => 'Good-bye. I am leaving because I am bored. - George Saunders, last words.' . ' ' . 'Generated: ' . $time,
            ];
        } elseif ($number === 1) {
            $data = [
                'Quote 2' => "Defer not till tomorrow to be wise, tomorrow's sun to thee may never rise. - William Congreve (1670 - 1729)." . " " . "Generated: " . $time,
            ];
        } elseif ($number === 2) {
            $data = [
                'Quote 3' => 'Those who cannot remember the past are condemned to repeat it. - George Santayana (1863 - 1952), The Life of Reason, Volume 1, 1905.' . ' ' . 'Generated: ' . $time,
            ];
        }

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}

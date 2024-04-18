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
                'me' => '/',
                'about' => '/about',
                'report' => '/report',
                'lucky' => '/lucky',
                'lucky_pretty_print' => '/api/lucky/number',
                'quote' => '/api/quote',
                'session' => '/api/session',
                'delete session' => '/delete',
                'deck' => 'card/deck',
                'shuffle' => '/card/deck/shuffle',
                'draw' => '/card/deck/draw',
                'draw number' => '/card/deck/draw/{input a number}',
                'api deck' => '/api/deck',
                'api shuffle' => '/api/deck/shuffle (navigate to the landingpage and use the shuffle button)'
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

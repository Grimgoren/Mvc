<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CardControllerKmom02Json
{
    #[Route("/api/session")]
    public function ThisSession(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $sessionData = $session->all();

        $response = new JsonResponse($sessionData);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck/shuffle")]
    public function apiShuffle(Request $request): JsonResponse
    {
        
    }
}
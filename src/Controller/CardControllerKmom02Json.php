<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    #[Route("/api/delete")]
    public function DeleteSession(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $session->clear();

        $this->addFlash(
            'Session cleared successfully'
        );

        return new JsonResponse([
            'success' => true,
            'message' => 'Session cleared successfully'
        ]);
    }
}
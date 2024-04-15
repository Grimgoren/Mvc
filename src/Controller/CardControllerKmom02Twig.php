<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CardControllerKmom02Twig extends AbstractController
{
    #[Route("/delete")]
    public function DeleteSession(Request $request): Response
    {
        $session = $request->getSession();
        $session->clear();

        $this->addFlash(
            'notice',
            'Session cleared successfully'
        );

        return $this->redirectToRoute('about');
    }
}
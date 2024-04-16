<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use App\Card\CardSort;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardControllerKmom02Twig extends AbstractController
{
    #[Route("/delete", name: "delete")]
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

    #[Route("/card", name: "card_init_get", methods: ['GET'])]
    public function initCard(SessionInterface $session): Response
    {
        $deck = new DeckOfCards();
        $sorter = new CardSort();
    
        // Retrieve the array of Card objects from the DeckOfCards instance
        $cards = $deck->getDeck();  // Assuming getDeck() returns an array of Card objects
    
        // Sort the cards
        $sorter->sortByValue($cards);
    
        // Pass the sorted cards to the template
        return $this->render('card.html.twig', [
            'cards' => $cards
        ]);
    }
    
}
<?php
namespace App\Service;

use App\Card\DeckOfCards;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GameInitializer
{
    /**
     * Function that checks session and adds things like the card deck to session if it is not present (in order to "launch" 
     * the project).
     */
    public function initializeGame(SessionInterface $session): void
    {
        $session->clear();

        if (!$session->has('deckOfCards')) {
            $session->set('deckOfCards', serialize(new DeckOfCards()));
        }
        if (!$session->has('playerCards')) {
            $session->set('playerCards', []);
        }
        if (!$session->has('playerCards2')) {
            $session->set('playerCards2', []);
        }
        if (!$session->has('playerCards3')) {
            $session->set('playerCards3', []);
        }
        if (!$session->has('dealerCards')) {
            $session->set('dealerCards', []);
        }
    }
}
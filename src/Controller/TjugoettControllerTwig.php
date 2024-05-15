<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TjugoettControllerTwig extends AbstractController 
{
    #[Route("/game", name: "gamepage")]
    public function cardStartPage(SessionInterface $session): Response
    {
        $session->clear();

        if (!$session->has('deckOfCards')) {
            $session->set('deckOfCards', serialize(new DeckOfCards()));
        }
        if (!$session->has('playerCards')) {
            $session->set('playerCards', []);
        }
        if (!$session->has('dealerCards')) {
            $session->set('dealerCards', []);
        }

        $deckOfCards = unserialize($session->get('deckOfCards'));
        $playerCards = $session->get('playerCards');
        $dealerCards = $session->get('dealerCards');
        $deckCount = count($deckOfCards->getDeck());

        error_log("There are this many cards currently: ". $deckCount);

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'deckCount' => $deckCount
        ]);
    }

    #[Route("/game/start", name: "startgame", methods: ['GET'])]
    public function initGame(SessionInterface $session): Response
    {
        $session->clear();

        $deckOfCards = new DeckOfCards();
        $deckOfCards->shuffleDeck();

        $playerCards = [
            $deckOfCards->drawCard(),
            $deckOfCards->drawCard()
        ];
        $dealerCards = [
            $deckOfCards->drawCard(),
            $deckOfCards->drawCard()
        ];

        $playerHand = new CardHand();
        foreach ($playerCards as $card) {
            $playerHand->add($card);
        }

        $dealerHand = new CardHand();
        foreach ($dealerCards as $card) {
            $dealerHand->add($card);
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('dealerCards', $dealerCards);

        $deckCount = count($deckOfCards->getDeck());

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'deckCount' => $deckCount
        ]);
    }

    #[Route("/game/continue", name: "continuegame", methods: ['GET'])]
    public function continueGame(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));
        $oldPlayerCards = $session->get('playerCards');
        $dealerCards = $session->get('dealerCards');

        $newCard = $deckOfCards->drawCard();
        $playerCards = array_merge($oldPlayerCards, [$newCard]);

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('dealerCards', $dealerCards);

        $deckCount = count($deckOfCards->getDeck());

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'deckCount' => $deckCount
        ]);
    }
}

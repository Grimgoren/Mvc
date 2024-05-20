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

        $gameDone = false;

        error_log("There are this many cards currently: ". $deckCount);

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'deckCount' => $deckCount,
            'class' => $gameDone ? "finish" : ""
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

        $playerValue = $playerHand->getHandValue();
        $dealerValue = $dealerHand->getHandValue();

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('dealerCards', $dealerCards);
        $session->set('playerValue', $playerValue);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = false;

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'playerValue' => $playerValue,
            'dealerValue' => $dealerValue,
            'deckCount' => $deckCount,
            'class' => $gameDone ? "finish" : ""
        ]);
    }

    #[Route("/game/continue", name: "continuegame", methods: ['GET'])]
    public function continueGame(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));
        $oldPlayerCards = $session->get('playerCards');
        $dealerCards = $session->get('dealerCards');
        $dealerValue = $session->get('dealerValue');

        $newCard = $deckOfCards->drawCard();
        $playerCards = array_merge($oldPlayerCards, [$newCard]);

        $playerHand = new CardHand();
        foreach ($playerCards as $card) {
            $playerHand->add($card);
        }

        $playerValue = $playerHand->getHandValue();

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('dealerCards', $dealerCards);
        $session->set('playerValue', $playerValue);

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = false;

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'dealerValue' => $dealerValue,
            'playerValue' => $playerValue,
            'deckCount' => $deckCount,
            'class' => $gameDone ? "finish" : ""
        ]);
    }

    #[Route("/game/stop", name: "stopgame", methods: ['GET'])]
    public function stopGame(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));
        $oldDealerCards = $session->get('dealerCards');
        $playerCards = $session->get('playerCards');
        $playerValue = $session->get('playerValue');

        $dealerHand = new CardHand();
        foreach ($oldDealerCards as $card) {
            $dealerHand->add($card);
        }

        $dealerValue = $dealerHand->getHandValue();

        while ($dealerValue <= 21) {
            $newCard = $deckOfCards->drawCard();
            $dealerHand->add($newCard);
            $dealerValue = $dealerHand->getHandValue();
            $oldDealerCards[] = $newCard;
        }
    
        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('dealerCards', $oldDealerCards);

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = true;

        $this->addFlash(
            'notice',
            'Resultat:'
        );

        return $this->render('21game.html.twig', [
            'playerCards' => $playerCards,
            'dealerCards' => $oldDealerCards,
            'playerValue' => $playerValue,
            'dealerValue' => $dealerValue,
            'deckCount' => $deckCount,
            'dealerValue' => $dealerValue,
            'class' => $gameDone ? "finish" : ""
        ]);
    }
}

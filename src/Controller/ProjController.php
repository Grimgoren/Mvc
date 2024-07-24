<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;

class ProjController extends AbstractController
{
    #[Route("/proj", name: "proj")]
    public function blackJackStart(SessionInterface $session): Response
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

        $deckOfCards = unserialize($session->get('deckOfCards'));
        $playerCards = $session->get('playerCards');
        $playerCards2 = $session->get('playerCards2');
        $playerCards3 = $session->get('playerCards3');
        $dealerCards = $session->get('dealerCards');
        $deckCount = count($deckOfCards->getDeck());

        $gameDone = false;

        error_log("There are this many cards currently: ". $deckCount);

        return $this->render('blackjack/proj.html.twig', [
            'playerCards' => $playerCards,
            'playerCards2' => $playerCards2,
            'playerCards3' => $playerCards3,
            'dealerCards' => $dealerCards,
            'deckCount' => $deckCount,
            'class' => $gameDone
        ]);
    }

    #[Route("/blackjack/start", name: "blackjack", methods: ['GET'])]
    public function startBlackJack(SessionInterface $session): Response
    {
        $session->clear();

        $deckOfCards = new DeckOfCards();
        $deckOfCards->shuffleDeck();

        $playerCards = [
            $deckOfCards->drawCard(),
            $deckOfCards->drawCard()
        ];
        $playerCards2 = [
            $deckOfCards->drawCard(),
            $deckOfCards->drawCard()
        ];
        $playerCards3 = [
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

        $playerHand2 = new CardHand();
        foreach ($playerCards2 as $card) {
            $playerHand2->add($card);
        }

        $playerHand3 = new CardHand();
        foreach ($playerCards3 as $card) {
            $playerHand3->add($card);
        }

        $dealerHand = new CardHand();
        foreach ($dealerCards as $card) {
            $dealerHand->add($card);
        }

        $playerValue = $playerHand->getHandValue();
        $playerValue2 = $playerHand2->getHandValue();
        $playerValue3 = $playerHand3->getHandValue();
        $dealerValue = $dealerHand->getHandValue();

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('playerCards2', $playerCards2);
        $session->set('playerCards3', $playerCards3);
        $session->set('dealerCards', $dealerCards);
        $session->set('playerValue', $playerValue);
        $session->set('playerValue2', $playerValue2);
        $session->set('playerValue3', $playerValue3);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = false;

        $stand1 = false;
        $stand2 = false;
        $stand3 = false;

        return $this->render('blackjack/blackjackstart.html.twig', [
            'playerCards' => $playerCards,
            'playerCards2' => $playerCards2,
            'playerCards3' => $playerCards3,
            'dealerCards' => $dealerCards,
            'playerValue' => $playerValue,
            'playerValue2' => $playerValue2,
            'playerValue3' => $playerValue3,
            'dealerValue' => $dealerValue,
            'deckCount' => $deckCount,
            'class' => $gameDone,
            'stand1' => $stand1,
            'stand2' => $stand2,
            'stand3' => $stand3,
        ]);
    }

    #[Route("/blackjack/gameCheck", name: "gameCheck", methods: ['GET'])]
    public function gameCheck(SessionInterface $session, Request $request): Response
    {

        $deckOfCards = unserialize($session->get('deckOfCards'));

        $oldPlayerCards1 = $session->get('playerCards', []);
        $oldPlayerCards2 = $session->get('playerCards2', []);
        $oldPlayerCards3 = $session->get('playerCards3', []);
        
        $dealerCards = $session->get('dealerCards');
        $dealerValue = $session->get('dealerValue');

        $playerValue1 = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $hitMe1 = $session->get('player1Hit');
        $hitMe2 = $session->get('player2Hit');
        $hitMe3 = $session->get('player3Hit');

        $stand1 = $session->get('player1Stand', false);
        $stand2 = $session->get('player2Stand', false);
        $stand3 = $session->get('player3Stand', false);

        $doubledDown1 = $session->get('player1DoubledDown', false);
        $doubledDown2 = $session->get('player2DoubledDown', false);
        $doubledDown3 = $session->get('player3DoubledDown', false);

        $hitMe = [
            'player1' => $hitMe1,
            'player2' => $hitMe2,
            'player3' => $hitMe3
        ];

        $doubledDown = [
            'player1' => $doubledDown1,
            'player2' => $doubledDown2,
            'player3' => $doubledDown3
        ];

        $playerValues = [
            'player1' => $playerValue1,
            'player2' => $playerValue2,
            'player3' => $playerValue3
        ];

        $playerCards = [
            'player1' => $oldPlayerCards1,
            'player2' => $oldPlayerCards2,
            'player3' => $oldPlayerCards3
        ];

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = $stand1 && $stand2 && $stand3;

        //var_dump($stand1); 
        //print_r($stand1);

        //var_dump($stand2); 
        //print_r($stand2);

        //var_dump($stand3); 
        //print_r($stand3);

        return $this->render('blackjack/blackjackstart.html.twig', [
            'playerCards' => $playerCards['player1'],
            'playerCards2' => $playerCards['player2'],
            'playerCards3' => $playerCards['player3'],
            'dealerCards' => $dealerCards,
            'dealerValue' => $dealerValue,
            'playerValue' => $playerValues['player1'],
            'playerValue2' => $playerValues['player2'],
            'playerValue3' => $playerValues['player3'],
            'deckCount' => $deckCount,
            'class' => $gameDone ? "finish" : "",
            'stand1' => $stand1,
            'stand2' => $stand2,
            'stand3' => $stand3,
            'double1' => $doubledDown1,
            'double2' => $doubledDown2,
            'double3' => $doubledDown3
        ]);
    }

    #[Route("/blackjack/hitRegister", name: "hitRegister", methods: ['GET'])]
    public function hitRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        if (in_array($player, ['player1', 'player2', 'player3'])) {
            $session->set($player . 'Hit', true);
        }

        return $this->redirectToRoute('hit');
    }

    #[Route("/blackjack/hit", name: "hit", methods: ['GET'])]
    public function blackJackHit(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));

        $oldPlayerCards1 = $session->get('playerCards', []);
        $oldPlayerCards2 = $session->get('playerCards2', []);
        $oldPlayerCards3 = $session->get('playerCards3', []);
        
        $dealerCards = $session->get('dealerCards');
        $dealerValue = $session->get('dealerValue');

        $playerValue1 = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $hitMe1 = $session->get('player1Hit');
        $hitMe2 = $session->get('player2Hit');
        $hitMe3 = $session->get('player3Hit');

        $stand1 = $session->get('player1Stand', false);
        $stand2 = $session->get('player2Stand', false);
        $stand3 = $session->get('player3Stand', false);

        $doubledDown1 = $session->get('player1DoubledDown', false);
        $doubledDown2 = $session->get('player2DoubledDown', false);
        $doubledDown3 = $session->get('player3DoubledDown', false);

        $hitMe = [
            'player1' => $hitMe1,
            'player2' => $hitMe2,
            'player3' => $hitMe3
        ];

        $doubledDown = [
            'player1' => $doubledDown1,
            'player2' => $doubledDown2,
            'player3' => $doubledDown3
        ];

        $playerValues = [
            'player1' => $playerValue1,
            'player2' => $playerValue2,
            'player3' => $playerValue3
        ];

        $playerCards = [
            'player1' => $oldPlayerCards1,
            'player2' => $oldPlayerCards2,
            'player3' => $oldPlayerCards3
        ];

        foreach (['player1', 'player2', 'player3'] as $player) {
            if ($hitMe[$player] && !$doubledDown[$player]) {
                $newCard = $deckOfCards->drawCard();
                $playerCards[$player][] = $newCard;
                $playerHand = new CardHand();
                foreach ($playerCards[$player] as $card) {
                    $playerHand->add($card);
                }
                $playerValues[$player] = $playerHand->getHandValue();

                switch ($player) {
                    case 'player1':
                        $session->set('playerCards', $playerCards['player1']);
                        $session->set('playerValue', $playerValues['player1']);
                        $session->set('player1Hit', false);
                        break;
                    case 'player2':
                        $session->set('playerCards2', $playerCards['player2']);
                        $session->set('playerValue2', $playerValues['player2']);
                        $session->set('player2Hit', false);
                        break;
                    case 'player3':
                        $session->set('playerCards3', $playerCards['player3']);
                        $session->set('playerValue3', $playerValues['player3']);
                        $session->set('player3Hit', false);
                        break;
                }
            }
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('dealerCards', $dealerCards);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        return $this->redirectToRoute('gameCheck');
    }

    #[Route("/blackjack/standRegister", name: "standRegister", methods: ['GET'])]
    public function standRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        if (in_array($player, ['player1', 'player2', 'player3'])) {
            $session->set($player . 'Stand', true);
        }

        return $this->redirectToRoute('stand');
    }

    #[Route("/blackjack/stand", name: "stand", methods: ['GET'])]
    public function stopBlackJack(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));

        $oldDealerCards = $session->get('dealerCards', []);
        $playerCards1 = $session->get('playerCards', []);
        $playerCards2 = $session->get('playerCards2', []);
        $playerCards3 = $session->get('playerCards3', []);
        $playerValue1 = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $stand1 = $session->get('player1Stand', false);
        $stand2 = $session->get('player2Stand', false);
        $stand3 = $session->get('player3Stand', false);

        $busted1 = $session->get('player1Bust', false);
        $busted2 = $session->get('player2Bust', false);
        $busted3 = $session->get('player3Bust', false);

        $stand = [
            'player1' => $stand1,
            'player2' => $stand2,
            'player3' => $stand3
        ];

        $busted = [
            'player1' => $busted1,
            'player2' => $busted2,
            'player3' => $busted3
        ];

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards1);
        $session->set('playerCards2', $playerCards2);
        $session->set('playerCards3', $playerCards3);

        $deckCount = count($deckOfCards->getDeck());

        $allStandingOrBusted = true;
        foreach (['player1', 'player2', 'player3'] as $player) {
            if (!($busted[$player] || $stand[$player])) {
                $allStandingOrBusted = false;
                break;
            }
        }

        if ($allStandingOrBusted) {
            $dealerHand = new CardHand();
            foreach ($oldDealerCards as $card) {
                $dealerHand->add($card);
            }
    
            $dealerValue = $dealerHand->getHandValue();
    
            while ($dealerValue < 17) {
                $newCard = $deckOfCards->drawCard();
                $dealerHand->add($newCard);
                $dealerValue = $dealerHand->getHandValue();
                $oldDealerCards[] = $newCard;
                $session->set('dealerCards', $oldDealerCards);
                $session->set('dealerValue', $dealerValue);
            }
        }

        return $this->redirectToRoute('gameCheck');
    }

    #[Route("/blackjack/doublingRegister", name: "doublingRegister", methods: ['GET'])]
    public function doublingRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        if (in_array($player, ['player1', 'player2', 'player3'])) {
            $session->set($player . 'DoubledDown', true);
        }

        return $this->redirectToRoute('DoublingDown');
    }

    #[Route("/blackjack/DoublingDown", name: "DoublingDown", methods: ['GET'])]
    public function blackJackDoublingDown(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));

        $oldPlayerCards1 = $session->get('playerCards', []);
        $oldPlayerCards2 = $session->get('playerCards2', []);
        $oldPlayerCards3 = $session->get('playerCards3', []);

        $dealerCards = $session->get('dealerCards');
        $dealerValue = $session->get('dealerValue');

        $playerValue1 = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $hitMe1 = $session->get('player1Hit');
        $hitMe2 = $session->get('player2Hit');
        $hitMe3 = $session->get('player3Hit');

        $stand1 = $session->get('player1Stand', false);
        $stand2 = $session->get('player2Stand', false);
        $stand3 = $session->get('player3Stand', false);

        $doubledDown1 = $session->get('player1DoubledDown', false);
        $doubledDown2 = $session->get('player2DoubledDown', false);
        $doubledDown3 = $session->get('player3DoubledDown', false);

        $hitMe = [
            'player1' => $hitMe1,
            'player2' => $hitMe2,
            'player3' => $hitMe3
        ];

        $doubledDown = [
            'player1' => $doubledDown1,
            'player2' => $doubledDown2,
            'player3' => $doubledDown3
        ];

        $playerValues = [
            'player1' => $playerValue1,
            'player2' => $playerValue2,
            'player3' => $playerValue3
        ];

        $playerCards = [
            'player1' => $oldPlayerCards1,
            'player2' => $oldPlayerCards2,
            'player3' => $oldPlayerCards3
        ];

        foreach (['player1', 'player2', 'player3'] as $player) {
            if (!$hitMe[$player] && $doubledDown[$player]) {
                $newCard = $deckOfCards->drawCard();
                $playerCards[$player][] = $newCard;
                $playerHand = new CardHand();
                foreach ($playerCards[$player] as $card) {
                    $playerHand->add($card);
                }
                $playerValues[$player] = $playerHand->getHandValue();

                switch ($player) {
                    case 'player1':
                        $session->set('playerCards', $playerCards['player1']);
                        $session->set('playerValue', $playerValues['player1']);
                        $session->set('player1DoubledDown', false);
                        $session->set('player1Stand', true);
                        break;
                    case 'player2':
                        $session->set('playerCards2', $playerCards['player2']);
                        $session->set('playerValue2', $playerValues['player2']);
                        $session->set('player2DoubledDown', false);
                        $session->set('player2Stand', true);
                        break;
                    case 'player3':
                        $session->set('playerCards3', $playerCards['player3']);
                        $session->set('playerValue3', $playerValues['player3']);
                        $session->set('player3DoubledDown', false);
                        $session->set('player3Stand', true);
                        break;
                }
            }
        }

        $stand1Check = $session->get('player1Stand', false);
        $stand2Check = $session->get('player2Stand', false);
        $stand3Check = $session->get('player3Stand', false);

        $busted1 = $session->get('player1Bust', false);
        $busted2 = $session->get('player2Bust', false);
        $busted3 = $session->get('player3Bust', false);

        $stand = [
            'player1' => $stand1Check,
            'player2' => $stand2Check,
            'player3' => $stand3Check
        ];

        $busted = [
            'player1' => $busted1,
            'player2' => $busted2,
            'player3' => $busted3
        ];

        $allStandingOrBusted = true;
        foreach (['player1', 'player2', 'player3'] as $player) {
            if (!($busted[$player] || $stand[$player])) {
                $allStandingOrBusted = false;
                break;
            }
        }

        if ($allStandingOrBusted) {
            $dealerHand = new CardHand();
            foreach ($dealerCards as $card) {
                $dealerHand->add($card);
            }
    
            $dealerValue = $dealerHand->getHandValue();
    
            while ($dealerValue < 17) {
                $newCard = $deckOfCards->drawCard();
                $dealerHand->add($newCard);
                $dealerValue = $dealerHand->getHandValue();
                $dealerCards[] = $newCard;
                $session->set('dealerCards', $dealerCards);
                $session->set('dealerValue', $dealerValue);
            }
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('dealerCards', $dealerCards);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        return $this->redirectToRoute('gameCheck');
    }
}

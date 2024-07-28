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

class Doubling extends AbstractController
{
    /**
     * Route which sets a player as wanting to double their bet.
     */
    #[Route("/blackjack/doublingRegister", name: "doublingRegister", methods: ['GET'])]
    public function doublingRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        $busted = $session->get($player . 'Bust', false);
        if (in_array($player, ['player1', 'player2', 'player3']) && !$busted) {
            $session->set($player . 'DoubledDown', true);
        }

        return $this->redirectToRoute('DoublingDown');
    }

    /**
     * Route to double a players bet and give them their card.
     */
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

        $doubledDown1 = $session->get('player1DoubledDown', false);
        $doubledDown2 = $session->get('player2DoubledDown', false);
        $doubledDown3 = $session->get('player3DoubledDown', false);

        $bet1 = (int) $session->get('bet1', 0);
        $bet2 = (int) $session->get('bet2', 0);
        $bet3 = (int) $session->get('bet3', 0);

        $bets = [
            'player1' => $bet1,
            'player2' => $bet2,
            'player3' => $bet3
        ];

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
                $bets[$player] *= 2;
                $newCard = $deckOfCards->drawCard();
                $playerCards[$player][] = $newCard;
                $playerHand = new CardHand();
                foreach ($playerCards[$player] as $card) {
                    $playerHand->add($card);
                }
                $playerValues[$player] = $playerHand->getHandValue();

                if ($playerValues[$player] > 21) {
                    $session->set($player . 'Bust', true);
                }

                switch ($player) {
                    case 'player1':
                        $session->set('playerCards', $playerCards['player1']);
                        $session->set('playerValue', $playerValues['player1']);
                        $session->set('bet1', $bets['player1']);
                        $session->set('player1DoubledDown', false);
                        $session->set('player1Stand', true);
                        break;
                    case 'player2':
                        $session->set('playerCards2', $playerCards['player2']);
                        $session->set('playerValue2', $playerValues['player2']);
                        $session->set('bet2', $bets['player2']);
                        $session->set('player2DoubledDown', false);
                        $session->set('player2Stand', true);
                        break;
                    case 'player3':
                        $session->set('playerCards3', $playerCards['player3']);
                        $session->set('playerValue3', $playerValues['player3']);
                        $session->set('bet3', $bets['player3']);
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

        return $this->redirectToRoute('gameCheck');
    }
}
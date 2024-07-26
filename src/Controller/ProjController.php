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
    /**
     * Route to initialize session variables and engage the game.
     */
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

    /**
     * Route for the about page which describes what the project is about.
     */
    #[Route("/proj/about", name: "projAbout")]
    public function projAboutPage(): Response
    {
        return $this->render('blackjack/blackjackAbout.html.twig');
    }

    /**
     * Route to start the game.
     */
    #[Route("/blackjack/start", name: "blackjack", methods: ['GET', 'POST'])]
    public function startBlackJack(SessionInterface $session, Request $request): Response
    {
        $name1 = $session->get('name1');
        $bet1 = (int) $session->get('bet1', 0);
        $name2 = $session->get('name2');
        $bet2 = (int) $session->get('bet2', 0);
        $name3 = $session->get('name3');
        $bet3 = (int) $session->get('bet3', 0);

        $session->clear();

        $session->set('name1', $name1);
        $session->set('bet1', $bet1);
        $session->set('name2', $name2);
        $session->set('bet2', $bet2);
        $session->set('name3', $name3);
        $session->set('bet3', $bet3);

        $deckOfCards = new DeckOfCards();
        $deckOfCards->shuffleDeck();

        $name1 = $request->request->get('name1', $session->get('name1'));
        $bet1 = $request->request->get('bet1', $session->get('bet1', 0));
        $name2 = $request->request->get('name2', $session->get('name2'));
        $bet2 = $request->request->get('bet2', $session->get('bet2', 0));
        $name3 = $request->request->get('name3', $session->get('name3'));
        $bet3 = $request->request->get('bet3', $session->get('bet3', 0));

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

        $busted1 = false;
        $busted2 = false;
        $busted3 = false;

        if ($playerValue > 21) {
            $busted1 = true;
        }

        if ($playerValue2 > 21) {
            $busted2 = true;
        }

        if ($playerValue3 > 21) {
            $busted3 = true;
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('playerCards2', $playerCards2);
        $session->set('playerCards3', $playerCards3);
        $session->set('dealerCards', $dealerCards);
        $session->set('playerValue', $playerValue);
        $session->set('playerValue2', $playerValue2);
        $session->set('playerValue3', $playerValue3);
        $session->set('dealerValue', $dealerValue);
        $session->set('name1', $name1);
        $session->set('bet1', $bet1);
        $session->set('name2', $name2);
        $session->set('bet2', $bet2);
        $session->set('name3', $name3);
        $session->set('bet3', $bet3);
        $session->set('player1Bust', $busted1);
        $session->set('player2Bust', $busted2);
        $session->set('player3Bust', $busted3);

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
            'name1' => $name1,
            'name2' => $name2,
            'name3' => $name3,
            'bet1' => $bet1,
            'bet2' => $bet2,
            'bet3' => $bet3,
            'busted1' => $busted1,
            'busted2' => $busted2,
            'busted3' => $busted3
        ]);
    }

    /**
     * Route which checks the game state (other routes direct here).
     */
    #[Route("/blackjack/gameCheck", name: "gameCheck", methods: ['GET'])]
    public function gameCheck(SessionInterface $session): Response
    {
        $gameData = $this->getGameCheckData($session);

        $deckCount = count($gameData['deckOfCards']->getDeck());
        $gameDone = $gameData['stand1'] && $gameData['stand2'] && $gameData['stand3'];

        $winners = [
            'player1' => $this->whoWon($gameData['playerValue1'], $gameData['busted1'], $gameData['dealerValue']),
            'player2' => $this->whoWon($gameData['playerValue2'], $gameData['busted2'], $gameData['dealerValue']),
            'player3' => $this->whoWon($gameData['playerValue3'], $gameData['busted3'], $gameData['dealerValue'])
        ];

        $cashFlow = [
            'player1' => $this->payOut($winners['player1'], $gameData['bet1']),
            'player2' => $this->payOut($winners['player2'], $gameData['bet2']),
            'player3' => $this->payOut($winners['player3'], $gameData['bet3'])
        ];

        $balances = [
            'player1' => $cashFlow['player1'] + ($winners['player1'] === 'player' || $winners['player1'] === 'blackjack' ? $gameData['bet1'] : 0),
            'player2' => $cashFlow['player2'] + ($winners['player2'] === 'player' || $winners['player2'] === 'blackjack' ? $gameData['bet2'] : 0),
            'player3' => $cashFlow['player3'] + ($winners['player3'] === 'player' || $winners['player3'] === 'blackjack' ? $gameData['bet3'] : 0)
        ];

        if ($gameDone) {
            $session->set('balance1', $balances['player1']);
            $session->set('balance2', $balances['player2']);
            $session->set('balance3', $balances['player3']);
            $session->set('bet1', $balances['player1']);
            $session->set('bet2', $balances['player2']);
            $session->set('bet3', $balances['player3']);
        }

        return $this->render('blackjack/blackjackstart.html.twig', [
            'playerCards' => $gameData['playerCards']['player1'],
            'playerCards2' => $gameData['playerCards']['player2'],
            'playerCards3' => $gameData['playerCards']['player3'],
            'dealerCards' => $gameData['dealerCards'],
            'dealerValue' => $gameData['dealerValue'],
            'playerValue' => $gameData['playerValues']['player1'],
            'playerValue2' => $gameData['playerValues']['player2'],
            'playerValue3' => $gameData['playerValues']['player3'],
            'deckCount' => $deckCount,
            'class' => $gameDone ? "finish" : "",
            'stand1' => $gameData['stand1'],
            'stand2' => $gameData['stand2'],
            'stand3' => $gameData['stand3'],
            'name1' => $gameData['name1'],
            'name2' => $gameData['name2'],
            'name3' => $gameData['name3'],
            'bet1' => $gameData['bet1'],
            'bet2' => $gameData['bet2'],
            'bet3' => $gameData['bet3'],
            'busted1' => $gameData['busted1'],
            'busted2' => $gameData['busted2'],
            'busted3' => $gameData['busted3'],
            'winners' => $winners,
            'netResults' => $cashFlow,
            'balances' => $balances
        ]);
    }

    /**
     * Function which passes data to the GameCheck route.
     */
    private function getGameCheckData(SessionInterface $session): array
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

        $stand1 = $session->get('player1Stand', false);
        $stand2 = $session->get('player2Stand', false);
        $stand3 = $session->get('player3Stand', false);

        $busted1 = $session->get('player1Bust', false);
        $busted2 = $session->get('player2Bust', false);
        $busted3 = $session->get('player3Bust', false);

        $name1 = $session->get('name1');
        $bet1 = $session->get('bet1');
        $name2 = $session->get('name2');
        $bet2 = $session->get('bet2');
        $name3 = $session->get('name3');
        $bet3 = $session->get('bet3');

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

        return [
            'deckOfCards' => $deckOfCards,
            'playerCards' => $playerCards,
            'dealerCards' => $dealerCards,
            'dealerValue' => $dealerValue,
            'playerValues' => $playerValues,
            'playerValue1' => $playerValue1,
            'playerValue2' => $playerValue2,
            'playerValue3' => $playerValue3,
            'stand1' => $stand1,
            'stand2' => $stand2,
            'stand3' => $stand3,
            'busted1' => $busted1,
            'busted2' => $busted2,
            'busted3' => $busted3,
            'name1' => $name1,
            'bet1' => $bet1,
            'name2' => $name2,
            'bet2' => $bet2,
            'name3' => $name3,
            'bet3' => $bet3,
        ];
    }

    /**
     * Function to determine winners and losers.
     */
    private function whoWon(int $playerValue, bool $playerBusted, int $dealerValue): string
    {
        if ($playerBusted) {
            return 'busted';
        }
        if ($dealerValue > 21) {
            return 'player';
        }
        if ($playerValue > $dealerValue) {
            return 'player';
        }
        if ($playerValue < $dealerValue) {
            return 'dealer';
        }
        return 'push';
    }

    /**
     * Function which determines who is getting paid or not.
     */
    private function payOut(string $result, int $bet): int
    {
        switch ($result) {
            case 'player':
            case 'blackjack': // Assuming we handle blackjack as a special case if needed
                return $bet;
            case 'push':
                return 0;
            case 'busted':
            case 'dealer':
            default:
                return -$bet;
        }
    }

    /**
     * Route to continue playing the game after a round has concluded.
     */
    #[Route("/blackjack/playAgain", name: "playAgain", methods: ['GET'])]
    public function playAgain(SessionInterface $session): Response
    {
        $bet1 = (int) $session->get('bet1', 0);
        $bet2 = (int) $session->get('bet2', 0);
        $bet3 = (int) $session->get('bet3', 0);

        if ($bet1 < 10) {
            $bet1 = 10;
        }
        if ($bet2 < 10) {
            $bet2 = 10;
        }
        if ($bet3 < 10) {
            $bet3 = 10;
        }

        $session->set('bet1', $bet1);
        $session->set('bet2', $bet2);
        $session->set('bet3', $bet3);

        return $this->redirectToRoute('blackjack');
    }

    /**
     * Route which sets a player as being hit.
     */
    #[Route("/blackjack/hitRegister", name: "hitRegister", methods: ['GET'])]
    public function hitRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        $busted = $session->get($player . 'Bust', false);
        if (in_array($player, ['player1', 'player2', 'player3']) && !$busted) {
            $session->set($player . 'Hit', true);
        }
        return $this->redirectToRoute('hit');
    }

    /**
     * Route which continues after hitRegister and draws a card for the "hit" player.
     */
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

        $doubledDown1 = $session->get('player1DoubledDown', false);
        $doubledDown2 = $session->get('player2DoubledDown', false);
        $doubledDown3 = $session->get('player3DoubledDown', false);

        $busted1 = $session->get('player1Bust', false);
        $busted2 = $session->get('player2Bust', false);
        $busted3 = $session->get('player3Bust', false);

        $busted = [
            'player1' => $busted1,
            'player2' => $busted2,
            'player3' => $busted3
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
            if ($hitMe[$player] && !$doubledDown[$player] && !$busted[$player]) {
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

        return $this->redirectToRoute('gameCheck');
    }

    /**
     * Route which sets a player as standing.
     */
    #[Route("/blackjack/standRegister", name: "standRegister", methods: ['GET'])]
    public function standRegister(SessionInterface $session, Request $request): Response
    {
        $player = $request->query->get('player');
        if (in_array($player, ['player1', 'player2', 'player3'])) {
            $session->set($player . 'Stand', true);
        }

        return $this->redirectToRoute('stand');
    }

    /**
     * Route which makes the dealer draw his cards if everyone is standing (or busted).
     */
    #[Route("/blackjack/stand", name: "stand", methods: ['GET'])]
    public function stopBlackJack(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));

        $oldDealerCards = $session->get('dealerCards', []);
        $playerCards1 = $session->get('playerCards', []);
        $playerCards2 = $session->get('playerCards2', []);
        $playerCards3 = $session->get('playerCards3', []);

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

        $allStandingOrBusted = $stand1 || $busted1 && $stand2 || $busted2 && $stand3 || $busted3;
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

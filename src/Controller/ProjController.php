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

        var_dump($playerValue);
        print_r($playerValue);

        var_dump($playerValue2);
        print_r($playerValue2);

        var_dump($playerValue3);
        print_r($playerValue3);

        var_dump($dealerValue);
        print_r($dealerValue);

        var_dump($deckCount);
        print_r($deckCount);

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
            'class' => $gameDone
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
        
        // Retrieve all player cards and values from the session
        $playerCards = [
            'player1' => $session->get('playerCards', []),
            'player2' => $session->get('playerCards2', []),
            'player3' => $session->get('playerCards3', [])
        ];
    
        $playerValues = [
            'player1' => $session->get('playerValue', 0),
            'player2' => $session->get('playerValue2', 0),
            'player3' => $session->get('playerValue3', 0)
        ];
    
        $dealerCards = $session->get('dealerCards', []);
        $dealerValue = $session->get('dealerValue', 0);
    
        // Check which players have hit
        $hitMe = [
            'player1' => $session->get('player1Hit', false),
            'player2' => $session->get('player2Hit', false),
            'player3' => $session->get('player3Hit', false)
        ];
    
        // Check which players have doubled down
        $doubledDown = [
            'player1' => $session->get('playerDoubledDown', false),
            'player2' => $session->get('playerDoubledDown2', false),
            'player3' => $session->get('playerDoubledDown3', false)
        ];
    
        // Process hits for each player
        foreach ($hitMe as $player => $hit) {
            if ($hit && !$doubledDown[$player]) {
                $newCard = $deckOfCards->drawCard();
                $playerCards[$player][] = $newCard; // Add the new card to the player's hand
    
                $playerHand = new CardHand();
                foreach ($playerCards[$player] as $card) {
                    $playerHand->add($card);
                }
    
                $playerValues[$player] = $playerHand->getHandValue();
    
                // Update session values for the player
                $session->set($player . 'Cards', $playerCards[$player]);
                $session->set($player . 'Value', $playerValues[$player]);
                $session->set($player . 'Hit', false); // Reset hit flag
            }
        }
    
        // Update the deck of cards in the session
        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('dealerCards', $dealerCards);
        $session->set('dealerValue', $dealerValue);
    
        $deckCount = count($deckOfCards->getDeck());
        $gameDone = false;
    
        echo "player1: " . $playerValues['player1'] . "\n";
        echo "player2: " . $playerValues['player2'] . "\n";
        echo "player3: " . $playerValues['player3'] . "\n";
        echo "Dealer score: " . $dealerValue . "\n";
        echo "Deckcount: " . $deckCount . "\n";
        echo "Player1 doubled down?: " . ($doubledDown['player1'] ? 'Yes' : 'No') . "\n";
    
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
            'class' => $gameDone
        ]);
    }
    

    #[Route("/blackjack/stand", name: "stand", methods: ['GET'])]
    public function stopBlackJack(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));
        $oldDealerCards = $session->get('dealerCards');
        $playerCards = $session->get('playerCards');
        $playerCards2 = $session->get('playerCards2');
        $playerCards3 = $session->get('playerCards3');
        $playerValue = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $stand1 = $session->get('playerStand');
        $stand2 = $session->get('playerStand2');
        $stand3 = $session->get('playerStand3');

        $busted1 = $session->get('playerBust');
        $busted2 = $session->get('playerBust2');
        $busted3 = $session->get('playerBust3');

        $stand = [ // Lägg till en knapp per spelare som skickar true (default false) på hitme
            'player1' => $stand1,
            'player2' => $stand2,
            'player3' => $stand3
        ];

        $busted = [ // Lägg till en knapp per spelare som skickar true (default false) på hitme
            'player1' => $busted1,
            'player2' => $busted2,
            'player3' => $busted3
        ];

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
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('playerCards', $playerCards);
        $session->set('playerCards2', $playerCards2);
        $session->set('playerCards3', $playerCards3);
        $session->set('dealerCards', $oldDealerCards);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        $allBustedOrStanding = true;
        foreach (['player1', 'player2', 'player3'] as $player) {
            if (!($busted[$player] || $stand[$player])) {
                $allBustedOrStanding = false;
                break;
            }
        }

        $gameDone = $allBustedOrStanding;

        return $this->render('blackjack/blackjackstart.html.twig', [
            'playerCards' => $playerCards,
            'playerCards2' => $playerCards2,
            'playerCards3' => $playerCards3,
            'dealerCards' => $oldDealerCards,
            'playerValue' => $playerValue,
            'playerValue2' => $playerValue2,
            'playerValue3' => $playerValue3,
            'dealerValue' => $dealerValue,
            'deckCount' => $deckCount,
            'class' => $gameDone
        ]);
    }

    #[Route("/blackjack/DoublingDown", name: "DoublingDown", methods: ['GET'])]
    public function blackJackDoublingDown(SessionInterface $session): Response
    {
        $deckOfCards = unserialize($session->get('deckOfCards'));
        $oldPlayerCards1 = $session->get('playerCards');
        $oldPlayerCards2 = $session->get('playerCards2');
        $oldPlayerCards3 = $session->get('playerCards3');
        $dealerCards = $session->get('dealerCards');
        $dealerValue = $session->get('dealerValue');
        $playerValue = $session->get('playerValue');
        $playerValue2 = $session->get('playerValue2');
        $playerValue3 = $session->get('playerValue3');

        $doubling1 = $session->get('playerDoubling');
        $doubling2 = $session->get('playerDoubling2');
        $doubling3 = $session->get('playerDoubling3');

        $doublingDown = [
            'player1' => $doubling1,
            'player2' => $doubling2,
            'player3' => $doubling3
        ];

        $playerValues = [
            'player1' => $playerValue,
            'player2' => $playerValue2,
            'player3' => $playerValue3
        ];

        $oldPlayersCards = [
            'player1' => $oldPlayerCards1,
            'player2' => $oldPlayerCards2,
            'player3' => $oldPlayerCards3
        ];

        foreach ($doublingDown as $player => $doubling) {
            if ($doubling) {
                $newCard = $deckOfCards->drawCard();
                $playerCards = array_merge($oldPlayersCards[$player], [$newCard]);
                $playerHand = new CardHand();
                foreach ($playerCards as $card) {
                    $playerHand->add($card);
                }
                $playerValues[$player] = $playerHand->getHandValue();
                $session->set($player . 'Cards', $playerCards);
                $session->set($player . 'Value', $playerValues[$player]);
                $session->set($player . 'DoubledDown', true);
            }
        }

        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('dealerCards', $dealerCards);
        $session->set('dealerValue', $dealerValue);

        $deckCount = count($deckOfCards->getDeck());

        $gameDone = false;

        return $this->render('blackjack/blackjackstart.html.twig', [
            'playerCards' => $playerCards,
            'playerCards2' => $playerCards2,
            'playerCards3' => $playerCards3,
            'dealerCards' => $dealerCards,
            'dealerValue' => $dealerValue,
            'playerValue' => $playerValue,
            'playerValue2' => $playerValue2,
            'playerValue3' => $playerValue3,
            'deckCount' => $deckCount,
            'class' => $gameDone
        ]);
    }
}

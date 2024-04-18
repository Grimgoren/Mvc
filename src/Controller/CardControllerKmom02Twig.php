<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;
use App\Card\CardSort;
use App\Card\Draw;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardControllerKmom02Twig extends AbstractController
{
    #[Route("/card", name: "landingpage")]
    public function cardStartPage(Request $request): Response
    {
        return $this->render('landingpage.html.twig');
    }

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

    #[Route("/card/deck", name: "card_init_get", methods: ['GET'])]
    public function initCard(SessionInterface $session): Response
    {

        $deck = new DeckOfCards();
        $sorter = new CardSort();
        $cards = $deck->getDeck();
        $deckCount = count($cards);

        $session->set('All cards', $cards);
        $sorter->sortByValue($cards);
    
        return $this->render('deck.html.twig', [
            'cards' => $cards,
            'deckCount' => $deckCount
        ]);
    }

    #[Route("/card/deck/shuffle", name: "card_shuffle_get", methods: ['GET'])]
    public function initShuffle(SessionInterface $session, Request $request): Response
    {
        $session = $request->getSession();
        $session->clear();

        $deck = new DeckOfCards();
        $deck->shuffleDeck();
        $cards = $deck->getDeck();
        $deckCount = count($cards);

        $session->set('shuffled_deck', $cards);

        
        $this->addFlash(
            'notice',
            'Session reset! All cards restored.'
        );

        return $this->render('shuffle.html.twig', [
            'cards' => $cards,
            'deckCount' => $deckCount
        ]);
    }

    #[Route("/card/deck/draw", name: "card_draw_get", methods: ['GET'])]
    public function initDraw(SessionInterface $session): Response
    {
        if (!$session->has('deck')) {
            $deck = new DeckOfCards();
            $session->set('deck', $deck->getDeck());
        }

        $setDeck = $session->get('deck');

        $draw = new Draw($setDeck);
        $card = $draw->drawCard();
        $modifiedDeck = $draw->getDeck();
        $deckCount = count($modifiedDeck);
    
        $session->set('deck', $modifiedDeck);
        $session->set('drawn_card', $card);
    
        return $this->render('draw.html.twig', [
            'card' => $card,
            'deckCount' => $deckCount
        ]);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "card_draw_number_post")]
    public function initDrawNumber(SessionInterface $session, int $num): Response
    {
        if ($num > 52) {
            throw new \Exception("Cannot draw more than 52 cards!");
        }

        if (!$session->has('deck')) {
            $deck = new DeckOfCards();
            $session->set('deck', $deck->getDeck());
        }
    
        $currentDeck = $session->get('deck');
        $drawnCards = [];

        for ($i = 0; $i < $num; $i++) {
            if (empty($currentDeck)) {
                break;
            }

            $randomCard = array_rand($currentDeck);
            $drawnCards[] = $currentDeck[$randomCard];
            unset($currentDeck[$randomCard]);
        }

        $session->set('deck', $currentDeck);

        $session->set('drawn_cards', $drawnCards);

        return $this->render('draw-number.html.twig', [
            'cards' => $drawnCards,
            'deckCount' => count($currentDeck)
        ]);
    }
}

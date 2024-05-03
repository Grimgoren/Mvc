<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardControllerKmom02Json
{
    #[Route("/api/session")]
    public function ThisSession(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $sessionData = $session->all();

        $response = new JsonResponse($sessionData);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck", methods: ['GET'])]
    public function apiDeck(Request $request): JsonResponse
    {
        $deck = new DeckOfCards();
        $deck->sortByValue();
        $cards = $deck->getDeck();
        $deckCount = count($cards);

        $session = $request->getSession();
        $session->set('All cards', $cards);
        $session->remove('shuffled_deck');

        $sessionData = $session->all();

        $response = new JsonResponse($sessionData);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api-shuffle", methods: ['POST'])]
    public function apiShuffle(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $session->clear();

        $deck = new DeckOfCards();
        $deck->shuffleDeck();
        $cards = $deck->getDeck();
        $deckCount = count($cards);

        $session->set('shuffled_deck', $cards);

        $session = $request->getSession();
        $data = $sessionData = $session->all();
        $info = "Card deck has been reset!";

        $allData = [
            'info' => $info,
            'remaining' => $deckCount,
            'cards' => $data
        ];

        $response = new JsonResponse($allData);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/api/deck/draw", name: "api-draw", methods: ['POST'])]
    public function apiDraw(Request $request, SessionInterface $session): JsonResponse
    {
        if (!$session->has('deckOfCards')) {
            $deckOfCards = new DeckOfCards();
            $session->set('deckOfCards', serialize($deckOfCards));
        }

        $deckOfCards = unserialize($session->get('deckOfCards'));

        $card = $deckOfCards->drawCard();
        $deckCount = count($deckOfCards->getDeck());
        $session->set('deckOfCards', serialize($deckOfCards));
        $session->set('drawn_card', $card);

        $data = [
            'remaining_cards' => $deckCount,
            'card' => $card
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "api_draw_number", methods: ['POST'])]
    public function apiDrawNumber(SessionInterface $session, int $num): Response
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

        $data = [
            'Remaining cards' => count($currentDeck),
            'cards' => $drawnCards
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }
}

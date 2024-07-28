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

class ProjControllerRegisters extends AbstractController
{
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
}
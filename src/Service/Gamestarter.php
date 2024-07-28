<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Gamestarter
{
    /**
     * Function sets session and returns variables to start a game.
     */
    public function gamestarter(SessionInterface $session, Request $request): array
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
        $name1 = $request->request->get('name1', $session->get('name1'));
        $bet1 = $request->request->get('bet1', $session->get('bet1', 0));
        $name2 = $request->request->get('name2', $session->get('name2'));
        $bet2 = $request->request->get('bet2', $session->get('bet2', 0));
        $name3 = $request->request->get('name3', $session->get('name3'));
        $bet3 = $request->request->get('bet3', $session->get('bet3', 0));

        return [
            $name1,
            $name2,
            $name3,
            $bet1,
            $bet2,
            $bet3
        ];
    }
}

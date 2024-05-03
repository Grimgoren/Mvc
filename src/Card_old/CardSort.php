<?php

namespace App\Card;

use App\Card\CardValue;

class CardSort
{
    private static $suitValues = [
        'Clubs' => 0,
        'Diamonds' => 1,
        'Hearts' => 2,
        'Spades' => 3
    ];

    public function sortByValue(array &$cards): void
    {
        usort($cards, function ($cardA, $cardB) {
            $suitA = self::$suitValues[$cardA->getSuit()] ?? 0;
            $suitB = self::$suitValues[$cardB->getSuit()] ?? 0;
            if ($suitA !== $suitB) {
                return $suitA <=> $suitB;
            }

            $rankA = CardValue::getValue($cardA->getRank());
            $rankB = CardValue::getValue($cardB->getRank());
            return $rankA <=> $rankB;
        });
    }
}

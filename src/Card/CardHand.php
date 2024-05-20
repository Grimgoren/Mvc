<?php

namespace App\Card;

use App\Card\Card;
use App\Card\DeckOfCards;

class CardHand
{
    private $hand;

    public function __construct()
    {
        $this->hand = [];
    }

    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    public function getCardsAsString(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }

    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    public function getHandValue(): int
    {
        $value = 0;
        $numAces = 0;
        foreach ($this->hand as $card) {
            $rank = $card->getRank();
            $value += DeckOfCards::getCardValue($rank);
            if ($rank === 'A') {
                $numAces++;
            }
        }
        while ($numAces > 0 && $value > 21) {
            $value -= 13;
            $numAces--;
        }
        return $value;
    }
}

<?php

namespace App\Card;

use App\Card\Card;
use App\Card\DeckOfCards;

/**
 * CardHand class representing a hand with cards.
 */
class CardHand
{
    private $hand;

    /**
     * Constructor of the hand class.
     */
    public function __construct()
    {
        $this->hand = [];
    }

    /**
     * Function that adds cards to the hand.
     */
    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * Function that gets the card hand as a string.
     */
    public function getCardsAsString(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }

    /**
     * Function that returns the number of cards in the hand.
     */
    public function getNumberCards(): int
    {
        return count($this->hand);
    }

    /**
     * Function that returns the total value of the cards in the hand.
     */
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

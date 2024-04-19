<?php

namespace App\Card;

class Draw
{
    private $deck;

    public function __construct(array $deck)
    {
        $this->deck = $deck;
    }

    public function drawCard()
    {
        $randomKey = array_rand($this->deck);
        $randomCard = $this->deck[$randomKey];
        unset($this->deck[$randomKey]);
        return $randomCard;
    }

    public function getDeck(): array
    {
        return $this->deck;
    }
}

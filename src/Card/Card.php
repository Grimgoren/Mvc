<?php

namespace App\Card;

class Card
{
    protected $suit;
    protected $rank;

    public function __construct($suit, $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    public function getAsString(): string
    {
        return "{$this->rank} {$this->suit}";
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }
}

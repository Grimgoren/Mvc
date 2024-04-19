<?php

namespace App\Card;

class CardGraphic extends Card
{
    private $representation = [
        'Clubs' => '♣',
        'Hearts' => '♥',
        'Diamonds' => '♦',
        'Spades' => '♠'
    ];

    public function __construct($suit, $rank)
    {
        parent::__construct($suit, $rank);
    }

    public function getAsString(): string
    {
        return "{$this->rank} {$this->representation[$this->suit]}";
    }
}

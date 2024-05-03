<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    private $deck = [];
    private $suits = ['Clubs', 'Diamonds', 'Hearts', 'Spades'];
    private $ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    public function __construct()
    {
        $this->initializeDeck();
    }

    private function initializeDeck()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->ranks as $rank) {
                $this->deck[] = new CardGraphic($suit, $rank);
            }
        }
        $this->shuffleDeck();
    }

    public function shuffleDeck()
    {
        shuffle($this->deck);
    }

    public function drawCard()
    {
        if (count($this->deck) > 0) {
            $randomKey = array_rand($this->deck);
            $randomCard = $this->deck[$randomKey];
            unset($this->deck[$randomKey]);
            $this->deck = array_values($this->deck);
            return $randomCard;
        } else {
            return "No cards left in the deck";
        }
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function getAsString(): string
    {
        return implode(", ", array_map(function ($card) {
            return $card->getAsString();
        }, $this->deck));
    }
}

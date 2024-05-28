<?php

namespace App\Card;

use App\Card\CardGraphic;

class DeckOfCards
{
    private $deck = [];
    private $suits = ['Clubs', 'Diamonds', 'Hearts', 'Spades'];
    private $ranks = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    protected static $cardValues = [
        'A' => 14,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13
    ];

    private static $suitValues = [
        'Clubs' => 0,
        'Diamonds' => 1,
        'Hearts' => 2,
        'Spades' => 3
    ];

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
        if (count($this->deck) === 0) {
            return "No cards left in the deck";
        }

        $randomKey = array_rand($this->deck);
        $randomCard = $this->deck[$randomKey];
        unset($this->deck[$randomKey]);
        $this->deck = array_values($this->deck);

        return $randomCard;
    }

    public static function getCardValue($rank)
    {
        return self::$cardValues[$rank] ?? null;
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function sortByValue(): void
    {
        usort($this->deck, function ($cardA, $cardB) {
            $suitA = self::$suitValues[$cardA->getSuit()] ?? 0;
            $suitB = self::$suitValues[$cardB->getSuit()] ?? 0;
            if ($suitA !== $suitB) {
                return $suitA <=> $suitB;
            }

            $rankA = self::getCardValue($cardA->getRank());
            $rankB = self::getCardValue($cardB->getRank());
            return $rankA <=> $rankB;
        });
    }

    public function getAsString(): string
    {
        return implode(", ", array_map(function ($card) {
            return $card->getAsString();
        }, $this->deck));
    }
}

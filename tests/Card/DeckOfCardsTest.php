<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DeckOfCards.
 */
class DeckOfCardsTest extends TestCase
{
    /**
     * Construct card deck and test its initialization.
     */
    public function testInitializeDeck()
    {
        $deck = new DeckOfCards();

        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);
        $this->assertCount(52, $deck->getDeck());

        $firstCard = $deck->getDeck()[0];
        $this->assertInstanceOf("\App\Card\Card", $firstCard);
    }

    /**
     * Test shuffling the deck.
     */
    public function testShuffleDeck()
    {
        $deck = new DeckOfCards();
        $cardsBeforeShuffle = $deck->getDeck();

        $deck->shuffleDeck();
        $cardsAfterShuffle = $deck->getDeck();

        $this->assertNotEquals($cardsBeforeShuffle, $cardsAfterShuffle);
        $this->assertCount(52, $deck->getDeck());
    }

    /**
     * Test drawing a card.
     */
    public function testDrawCard()
    {
        $deck = new DeckOfCards();
        $deck->shuffleDeck();
        $deck->drawCard();

        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);
        $this->assertCount(51, $deck->getDeck());
    }

    /**
     * Test drawing to many cards.
     */
    public function testDrawManyOfCard()
    {
        $deck = new DeckOfCards();
        $deck->shuffleDeck();

        for ($i = 0; $i < 52; $i++) {
            $deck->drawCard();
        }

        $this->assertCount(0, $deck->getDeck());
        $result = $deck->drawCard();
        $this->assertEquals("No cards left in the deck", $result);
    }

    /**
     * Test retrieve the deck.
     */
    public function getDeck()
    {
        $deck = new DeckOfCards();
        $deck->getDeck();

        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);
        $this->assertCount(51, $deck->getDeck());
    }

    /**
     * Test getAsString method.
     */
    public function testGetAsString()
    {
        $deck = new DeckOfCards();
        $deck->shuffleDeck();
        $deckString = $deck->getAsString();

        $this->assertIsString($deckString);
        $this->assertNotEmpty($deckString);
    }

    /**
     * Test sortByValue method.
     */
    public function testSortByValue()
    {
        $unsortedDeck = new DeckOfCards();

        $sortedDeck = new DeckOfCards();
        $sortedDeck->sortByValue();

        $this->assertInstanceOf("\App\Card\DeckOfCards", $unsortedDeck);
        $this->assertInstanceOf("\App\Card\DeckOfCards", $sortedDeck);
        $this->assertNotEquals($unsortedDeck, $sortedDeck);
    }
}

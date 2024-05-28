<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHand.
 */
class CardHandTest extends TestCase
{
    /**
     * Construct card hand and add a card.
     */
    public function testCreateCardHand()
    {
        $hand = new CardHand();
        
        $this->assertInstanceOf("\App\Card\CardHand", $hand);
        $this->assertEquals(0, $hand->getNumberCards());
    }

    /**
     * Test add method.
     */
    public function testAddCardToHand()
    {
        $suit = "Hearts";
        $rank = "A";
        $card = new Card($suit, $rank);
        $hand = new CardHand();
        $hand->add($card);

        $cardsAsString = $hand->getCardsAsString();
        $this->assertCount(1, $cardsAsString);
        $this->assertEquals("A Hearts", $cardsAsString[0]);
    }

    /**
     * Test GetAssString method.
     */
    public function testGetCardsAsString()
    {
        $suit1 = "Hearts";
        $rank1 = "A";
        $card1 = new Card($suit1, $rank1);

        $suit2 = "Diamonds";
        $rank2 = "10";
        $card2 = new Card($suit2, $rank2);

        $hand = new CardHand();
        $hand->add($card1);
        $hand->add($card2);

        $cardsAsString = $hand->getCardsAsString();
        $this->assertCount(2, $cardsAsString);
        $this->assertEquals("A Hearts", $cardsAsString[0]);
        $this->assertEquals("10 Diamonds", $cardsAsString[1]);
    }

    /**
     * Test getHandValue method.
     */
    public function testGetHandValue()
    {
        $suit1 = "Hearts";
        $rank1 = "A";
        $card1 = new Card($suit1, $rank1);

        $suit2 = "Diamonds";
        $rank2 = "10";
        $card2 = new Card($suit2, $rank2);

        $hand = new CardHand();
        $hand->add($card1);
        $hand->add($card2);

        $handValue = $hand->getHandValue();
        $this->assertEquals(11, $handValue);

        $cardsAsString = $hand->getCardsAsString();
        $this->assertEquals("A Hearts", $cardsAsString[0]);
        $this->assertEquals("10 Diamonds", $cardsAsString[1]);
    }
}

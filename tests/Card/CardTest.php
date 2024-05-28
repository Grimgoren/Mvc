<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use arguments for suit and rank.
     */
    public function testCreateCard()
    {
        $suit = "Hearts";
        $rank = "A";
        $card = new Card($suit, $rank);
        
        $this->assertInstanceOf("\App\Card\Card", $card);

        $res = $card->getAsString();
        $this->assertNotEmpty($res);
        $this->assertEquals("A Hearts", $res);
    }

    /**
     * Test getRank method.
     */
    public function testGetRank()
    {
        $suit = "Hearts";
        $rank = "A";
        $card = new Card($suit, $rank);

        $res = $card->getRank();
        $this->assertEquals("A", $res);
    }

    /**
     * Test getSuit method.
     */
    public function testGetSuit()
    {
        $suit = "Hearts";
        $rank = "A";
        $card = new Card($suit, $rank);

        $res = $card->getSuit();
        $this->assertEquals("Hearts", $res);
    }
}

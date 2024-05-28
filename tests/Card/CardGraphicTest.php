<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class card graphic.
 */
class CardGraphicTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use arguments for suit and rank.
     */
    public function testCreateCard()
    {
        $suit = "Clubs";
        $rank = "A";
        $cardGraphic = new CardGraphic($suit, $rank);

        $this->assertInstanceOf("\App\Card\CardGraphic", $cardGraphic);

        $res = $cardGraphic->getAsString();
        $this->assertNotEmpty($res);
        $this->assertEquals("A ♣", $res);
    }

    /**
     * Test getAsString method.
     */
    public function testGetRank()
    {
        $suit = "Clubs";
        $rank = "A";
        $card = new CardGraphic($suit, $rank);

        $res = $card->getRank();
        $this->assertEquals("A", $res);
    }

    /**
     * Test getAsString method.
     */
    public function testGetSuit()
    {
        $suit = "Clubs";
        $rank = "A";
        $card = new CardGraphic($suit, $rank);

        $res = $card->getSuit();
        $this->assertEquals("Clubs", $res);
    }
}

<?php

namespace App\Tests\Service;

use App\Service\GameState;
use PHPUnit\Framework\TestCase;

class ProjGameStateTest extends TestCase
{
    public function testDealerWon()
    {
        $gamestate = new GameState();
        
        $playerValue = 10;
        $playerBusted = false;
        $dealerValue = 21;
        $playerCards = [5, 5];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('dealer', $result);
    }

    public function testPlayerWon()
    {
        $gamestate = new GameState();
        
        $playerValue = 20;
        $playerBusted = false;
        $dealerValue = 19;
        $playerCards = [10, 10];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('player', $result);
    }

    public function testPlayerBlackjack()
    {
        $gamestate = new GameState();
        
        $playerValue = 21;
        $playerBusted = false;
        $dealerValue = 20;
        $playerCards = [10, 11];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('blackjack', $result);
    }

    public function testPlayerWin21()
    {
        $gamestate = new GameState();
        
        $playerValue = 21;
        $playerBusted = false;
        $dealerValue = 20;
        $playerCards = [10, 5, 6];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('player', $result);
    }

    public function testDealerWin21()
    {
        $gamestate = new GameState();
        
        $playerValue = 20;
        $playerBusted = false;
        $dealerValue = 21;
        $playerCards = [10, 5, 6];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('dealer', $result);
    }

    public function testDealerBust()
    {
        $gamestate = new GameState();
        
        $playerValue = 10;
        $playerBusted = false;
        $dealerValue = 22;
        $playerCards = [5, 5];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('player', $result);
    }

    public function testPlayerBust()
    {
        $gamestate = new GameState();
        
        $playerValue = 25;
        $playerBusted = true;
        $dealerValue = 22;
        $playerCards = [13, 12];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('busted', $result);
    }

    public function testPush()
    {
        $gamestate = new GameState();
        
        $playerValue = 18;
        $playerBusted = false;
        $dealerValue = 18;
        $playerCards = [9, 9];

        $result = $gamestate->whoWon($playerValue, $playerBusted, $dealerValue, $playerCards);

        $this->assertEquals('push', $result);
    }

    public function testPayOut()
    {
        $payDay = new GameState();
        
        $bet = 20;
        $result = 'player';

        $payOut = $payDay->payOut($result, $bet);

        $this->assertEquals(40, $payOut);
    }

    public function testPayOutBlackjack()
    {
        $payDay = new GameState();
        
        $bet = 20;
        $result = 'blackjack';

        $payOut = $payDay->payOut($result, $bet);

        $this->assertEquals(60, $payOut);
    }

    public function testPayOutPush()
    {
        $payDay = new GameState();
        
        $bet = 20;
        $result = 'push';

        $payOut = $payDay->payOut($result, $bet);

        $this->assertEquals(0, $payOut);
    }

    public function testPayOutBusted()
    {
        $payDay = new GameState();
        
        $bet = 20;
        $result = 'busted';

        $payOut = $payDay->payOut($result, $bet);

        $this->assertEquals(-20, $payOut);
    }

    public function testPayOutDealer()
    {
        $payDay = new GameState();
        
        $bet = 20;
        $result = 'dealer';

        $payOut = $payDay->payOut($result, $bet);

        $this->assertEquals(-20, $payOut);
    }
}

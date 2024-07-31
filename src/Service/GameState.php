<?php

namespace App\Service;

class GameState
{
    /**
     * Function to determine winners and losers.
     */
    public function whoWon(int $playerValue, bool $playerBusted, int $dealerValue, array $playerCards): string
    {
        if ($playerBusted) {
            return 'busted';
        }
        if ($playerValue === 21 && count($playerCards) === 2) {
            return 'blackjack';
        }
        if ($dealerValue > 21) {
            return 'player';
        }
        if ($playerValue > $dealerValue) {
            return 'player';
        }
        if ($playerValue < $dealerValue) {
            return 'dealer';
        }
        return 'push';
    }

    /**
     * Function which determines who is getting paid or not.
     */
    public function payOut(string $result, int $bet): int
    {
        switch ($result) {
            case 'player':
                return 2 * $bet;
            case 'blackjack':
                return (int)(2.5 * $bet);
            case 'push':
                return $bet;
            case 'busted':
            case 'dealer':
            default:
                return -$bet;
        }
    }
}

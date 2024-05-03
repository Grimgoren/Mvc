<?php

namespace App\Card;

class CardValue
{
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

    public static function getValue($rank)
    {
        return self::$cardValues[$rank] ?? null;
    }
}

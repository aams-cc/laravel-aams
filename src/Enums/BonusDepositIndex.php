<?php

namespace Aams\LaravelAams\Enums;

enum BonusDepositIndex: int
{
    case Package = 999;
    case First = 1;
    case Second = 2;
    case Third = 3;
    case Fourth = 4;
    case Fifth = 5;
    case Sixth = 6;
    case Seventh = 7;
    case Eighth = 8;
    case Nineth = 9;
    case Tenth = 10;

    public function title(): string
    {
        return match($this) {
            self::Package => 'Package',
            self::First => '1st',
            self::Second => '2nd',
            self::Third => '3rd',
            self::Fourth => '4th',
            self::Fifth => '5th',
            self::Sixth => '6th',
            self::Seventh => '7th',
            self::Eighth => '8th',
            self::Nineth => '9th',
            self::Tenth => '10th',
        };
    }
}

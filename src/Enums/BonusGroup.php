<?php

namespace Aams\LaravelAams\Enums;

enum BonusGroup: string
{
    case Deposit = 'deposit';
    case NoDeposit = 'no_deposit';
    case Cashback = 'cashback';

    public function title(): string
    {
        return match($this) {
            self::Deposit => 'Deposit required',
            self::NoDeposit => 'No deposit required',
            self::Cashback => 'Cashback',
        };
    }
}

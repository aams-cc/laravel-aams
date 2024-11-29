<?php

namespace Aams\LaravelAams\Enums;

enum WageringType: string
{
    case Bonus = 'xb';
    case Deposit = 'xd';
    case BonusAndDeposit = 'xb+d';
}

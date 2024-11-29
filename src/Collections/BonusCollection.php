<?php

namespace Aams\LaravelAams\Collections;

use Aams\LaravelAams\Enums\BonusDepositType;
use Aams\LaravelAams\Enums\BonusGroup;
use Aams\LaravelAams\Objects\Bonus;

class BonusCollection extends \Illuminate\Support\Collection
{
    public function hasWelcomeBonus(): bool
    {
        return $this->where('group', BonusGroup::Deposit)
            ->where('depositType', BonusDepositType::Entry)
            ->isNotEmpty();
    }

    public function getWelcomeBonus(): ?Bonus
    {
        return $this->where('group', BonusGroup::Deposit)
            ->where('depositType', BonusDepositType::Entry)
            ->first();
    }

    public function getCashbackBonus(): ?Bonus
    {
        return $this->where('group', BonusGroup::Cashback)
            ->first();
    }

    public function getReloadBonus(): ?Bonus
    {
        return $this->where('group', BonusGroup::Deposit)
            ->where('depositType', BonusDepositType::Reload)
            ->first();
    }
}

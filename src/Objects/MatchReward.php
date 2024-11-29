<?php

namespace Aams\LaravelAams\Objects;

use Aams\LaravelAams\Collections\AmountCollection;
use Illuminate\Contracts\Support\Arrayable;

readonly class MatchReward implements Arrayable
{
    public function __construct(
        public int              $percentage,
        public AmountCollection $amounts,
        public AmountCollection $minDeposits,
    )
    {
        //
    }

    public static function from(array $array): MatchReward
    {
        return new MatchReward(
            percentage: $array['percentage'],
            amounts: new AmountCollection($array['amount'])
                ->filter(
                    fn(array $amount) => is_numeric($amount['amount']) && $amount['amount'] > 0
                )
                ->map(
                    fn(array $amount) => Amount::from($amount['amount'], $amount['currency']),
                ),
            minDeposits: new AmountCollection($array['min_deposit'])
                ->filter(
                    fn(array $amount) => is_numeric($amount['amount']) && $amount['amount'] > 0
                )
                ->map(
                    fn(array $amount) => Amount::from($amount['amount'], $amount['currency']),
                ),
        );
    }

    public function toArray(): array
    {
        return [
            'percentage' => $this->percentage,
        ];
    }
}

<?php

namespace Aams\LaravelAams\Objects;

readonly class SpinsReward
{
    public function __construct(
        public int $amount
    )
    {
        //
    }

    public static function from(array $array): SpinsReward
    {
        return new SpinsReward(
            amount: $array['amount'],
        );
    }
}

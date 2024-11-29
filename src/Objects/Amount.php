<?php

namespace Aams\LaravelAams\Objects;

use Illuminate\Contracts\Support\Arrayable;

readonly class Amount implements Arrayable
{
    public function __construct(
        public float $amount,
        public string $currency
    ) {
        //
    }

    public static function from(float $amount, string $currency): Amount
    {
        return new Amount($amount, $currency);
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency
        ];
    }
}

<?php

namespace Aams\LaravelAams\Objects;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

readonly class Markets
{
    public function __construct(
        public Collection $target,
        public Collection $restricted,
        public Carbon     $updatedAt,
    ) {
        //
    }

    public static function from(?array $array = null): Markets
    {
        if(!$array) {
            return new Markets(
                collect(),
                collect(),
                now()
            );
        }

        return new Markets(
            target: collect($array['target_countries']),
            restricted: collect($array['restricted_countries']),
            updatedAt: Carbon::parse($array['updated_at']),
        );
    }
}

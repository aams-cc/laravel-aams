<?php

namespace Aams\LaravelAams\Objects;

readonly class Link
{
    public function __construct(
        public string $id,
        public string $url,
        public string $country,
        public ?string $adId = null,
    )
    {
        //
    }

    public static function from(
        string $id,
        string $url,
        string $country,
        ?string $adId = null,
    ): Link
    {
        return new Link(
            id: $id,
            url: $url,
            country: $country,
            adId: $adId
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'country' => $this->country,
            'adId' => $this->adId,
        ];
    }
}

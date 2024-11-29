<?php

namespace Aams\LaravelAams\Objects;

readonly class Link
{
    public function __construct(
        public string $id,
        public string $url,
        public string $country,
    )
    {
        //
    }

    public static function from(array $array): Link
    {
        return new Link(
            id: $array['id'],
            url: $array['url'],
            country: $array['country'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'country' => $this->country,
        ];
    }
}

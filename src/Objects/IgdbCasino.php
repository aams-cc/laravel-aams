<?php

namespace Aams\LaravelAams\Objects;

use Aams\LaravelAams\Collections\BonusCollection;

readonly class IgdbCasino
{
    public function __construct(
        public array $original,
        public string $id,
        public string $title,
        public string $url,
        public BonusCollection $bonuses,
        public Markets $markets,
    )
    {
        //
    }

    public static function fromApi(array $array) : IgdbCasino
    {
        return new IgdbCasino(
            original: $array,
            id: $array['id'],
            title: $array['title'],
            url: $array['url'],
            bonuses: new BonusCollection(
                collect($array['bonuses'] ?? [])->map(
                    fn(array $bonus) => Bonus::from($bonus)
                )
            ),
            markets: Markets::from($array['market'] ?? null)
        );
    }

    public static function fromArray(array $array) : IgdbCasino
    {
        return new IgdbCasino(
            original: $array,
            id: $array['id'],
            title: $array['title'],
            url: $array['url'],
            bonuses: new BonusCollection(
                collect($array['bonuses'] ?? [])->map(
                    fn(array $bonus) => Bonus::from($bonus)
                )
            ),
            markets: Markets::from($array['market'] ?? null)
        );
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'bonuses' => $this->bonuses->toArray(),
            'markets' => $this->markets->toArray(),
        ];
    }
}

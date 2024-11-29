<?php

namespace Aams\LaravelAams\Objects;

use Aams\LaravelAams\Services\Aams;

class Casino
{
    protected Aams $service;

    public function __construct(
        public string $uuid,
        public string $id,
        public string $title,
        public ?IgdbCasino $data = null,
        public ?Link $link = null,
    )
    {
         $this->service = resolve(Aams::class);
    }

    public static function from(array $array): Casino
    {
        return new Casino(
            uuid: $array['uuid'],
            id: $array['id'],
            title: $array['title'],
            data: IgdbCasino::fromArray($array['data']),
            link: isset($array['link']) ? Link::from($array['link']) : null,
        );
    }

    public function load(): void
    {
        $this->data = $this->service->igdb()->casino($this->uuid);
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'id' => $this->id,
            'title' => $this->title,
            'data' => $this->data?->toArray(),
            'link' => $this->link?->toArray(),
        ];
    }
}

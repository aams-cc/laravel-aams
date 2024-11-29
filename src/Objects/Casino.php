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

    public static function from(string $uuid, string $id, string $title, ?Link $link = null, ?IgdbCasino $igdbCasino = null): Casino
    {
        $object = new Casino(
            uuid: $uuid,
            id: $id,
            title: $title,
            data: $igdbCasino,
            link: $link,
        );

        if(!$igdbCasino) {
            $object->load();
        }

        return $object;
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
            'data' => $this->data->toArray(),
            'link' => $this->link->toArray(),
        ];
    }
}

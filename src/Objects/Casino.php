<?php

namespace Aams\LaravelAams\Objects;

class Casino
{
    public function __construct(public string $id, public string $title)
    {
        //
    }

    public static function from(array $data): Casino
    {
        return new Casino($data['id'], $data['title']);
    }
}
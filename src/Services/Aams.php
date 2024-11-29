<?php

namespace Aams\LaravelAams\Services;

use Aams\LaravelAams\Objects\Casino;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Aams
{
    public function __construct(protected string $token, protected string $endpoint)
    {
        //
    }

    public function igdb(): IgdbApi
    {
        return new IgdbApi(config('aams.igdb_api_token'));
    }

    public function casinos(string $adId): Collection
    {
        $response = Http::withToken($this->token)->get("{$this->endpoint}/ads/{$adId}");
        $array = $response->json('data.casinos');

        return collect($array)->map(function (array $casino) {
            return Casino::from(
                uuid: $casino['uuid'],
            );
        });
    }

}

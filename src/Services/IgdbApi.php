<?php

namespace Aams\LaravelAams\Services;

use Aams\LaravelAams\Objects\IgdbCasino;
use Illuminate\Support\Facades\Http;

class IgdbApi
{
    protected string $token;

    protected string $endpoint = "https://igdb.api.aams.cc/api/direct/v1";

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function casino(string $id): IgdbCasino
    {
        $response = Http::withToken($this->token)
            ->throw()
            ->post("{$this->endpoint}/casinos/{$id}", ['country' => 'ROW']);

        return IgdbCasino::fromApi($response->json('data'));
    }
}

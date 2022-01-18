<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class BaseService
{
    abstract protected function getBaseUrl();

    /**
     * GET method
     * @param $url
     * @param array $params
     * @param array $headers
     * @return array|mixed
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function get($url, array $params = [], array $headers = [])
    {
        $response = Http::withHeaders($headers)
            ->get($url, $params);

        if (!$response->successful()) {
            $response->throw();
        }

        return $response->json();
    }

    /**
     * POST method
     */
    public function post()
    {
        // TODO
    }

    /**
     * POST Json method
     */
    public function postJson()
    {
        // TODO
    }
}

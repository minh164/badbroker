<?php

namespace App\Services;

class ExchangeRatesService extends BaseService
{
    /**
     * Get base URL of service
     * @return string
     */
    protected function getBaseUrl()
    {
        $version = env('EXCHANGERATES_API_VERSION');
        $baseUrl = env('EXCHANGERATES_URL');

        return $baseUrl . $version . '/';
    }

    /**
     * Add access key for argument were passed into
     * @param array $current_params
     * @return mixed
     */
    protected function addAccessKey(array $current_params = [])
    {
        $current_params['access_key'] = env('EXCHANGERATES_ACCESS_KEY');

        return $current_params;
    }

    /**
     * @param string $date
     * @param array $params
     * @return array|mixed
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getRatesByDay(string $date, array $params = [])
    {
        $baseUrl = $this->getBaseUrl();
        $uri = '/' . trim($date);
        $params = $this->addAccessKey($params);

        return $this->get($baseUrl . $uri, $params);
    }
}

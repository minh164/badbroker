<?php
namespace App\Repositories\Rate;

class RateApiRepository implements RateRepositoryInterface
{
    /**
     * @param array $request
     * @return array
     */
    public function getListByDate(array $request)
    {
        // TODO because my Subscription Plan of ExchangeRates service does not support "fluctuation" api
    }

    /**
     * @param array $request
     * @return array
     */
    public function getPaginationList(array $request)
    {
        // TODO
    }
}

<?php
namespace App\Repositories\Rate;

use App\Rate;
use App\Services\ExchangeRatesService;
use Mockery\Exception;

class RateDbRepository implements RateRepositoryInterface
{
    const DEFAULT_SYMBOLS = 'RUB,EUR,GBP,JPY';

    /**
     * @param array $request
     * @return array
     */
    public function getListByDate(array $request)
    {
        $query = Rate::query();

        if (!empty($request['from_date']) && !empty($request['to_date'])) {
            $from = date('Y-m-d', $request['from_date']);
            $to = date('Y-m-d', $request['to_date']);
        } else {
            $to = date('Y-m-d', strtotime('now'));
            $from = date('Y-m-d', strtotime($to . ' - 30 days'));
        }

        $query->whereBetween('date', [$from, $to]);

        $rateList = $query->get()->transform(function ($item, $key) {
            return [
                'id' => (int) $item['id'],
                'currency' => $item['currency'],
                'date' => $item['date'],
                'value' => $item['value']
            ];
        });

        return $rateList->toArray();
    }

    /**
     * @param array $request
     * @return array
     */
    public function getList(array $request)
    {
        $query = Rate::query();

        if (!empty($request['from_date']) && !empty($request['to_date'])) {
            $from = date('Y-m-d', $request['from_date']);
            $to = date('Y-m-d', $request['to_date']);
            $query->whereBetween('date', [$from, $to]);
        }

        $query->orderBy('id', 'desc');

        $query = $query->paginate($request['limit'] ?? 20);

        $groupItems = $query->transform(function ($item, $key) {
            return [
                'id' => (int) $item['id'],
                'currency' => $item['currency'],
                'date' => $item['date'],
                'value' => $item['value']
            ];
        });

        $rateList = $query->toArray();
        $rateList['data'] = $groupItems->toArray();

        return $rateList;
    }

    /**
     * @param $request
     * @return int
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function storeDataFromService($request)
    {
        if (empty($request['start_date'])) {
            throw new Exception('Please type start date!');
        }

        $start_date = $request['start_date'];
        $days = $request['days'] ?? 0;
        $successfulTotal = 0;

        for ($i=0; $i<=$days; $i++) {
            $date = date('Y-m-d', strtotime("{$start_date} + {$i} days"));

            // fetch api to get rates for each day
            $exchangeService = new ExchangeRatesService();
            $rateData = $exchangeService->getRatesByDay(
                $date,
                [
                    'symbols' => $request['symbols'] ?? self::DEFAULT_SYMBOLS
                ]
            );

            if (empty($rateData['rates'])) {
                continue;
            }

            foreach ($rateData['rates'] as $currency => $value) {
                $newRate = new Rate();
                $newRate->date = $date;
                $newRate->currency = $currency;
                $newRate->value = $value;
                $newRate->save();

                $successfulTotal+= 1;
            }
        }

        return $successfulTotal;
    }
}

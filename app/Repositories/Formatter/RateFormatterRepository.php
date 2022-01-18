<?php
namespace App\Repositories\Formatter;

class RateFormatterRepository
{
    /**
     *
     * @param array $rateList
     * @return array
     */
    public function groupByDate(array $rateList)
    {
        $collection = collect($rateList);

        // group rate by date key
        $collection = $collection->mapToGroups(function ($item, $key) {
            $date = date('Y-m-d', strtotime($item['date']));
            return [$date => $item];
        })->toArray();

        // replace key for child item by curreny
        foreach ($collection as $key => $itemList) {
            foreach ($itemList as $childKey => $item) {
                $collection[$key][$item['currency']] = $item;
                // remove old key
                unset($collection[$key][$childKey]);
            }
        }

        // sort ASC
        uksort($collection, function ($item1, $items2) {
            $time1 = strtotime($item1);
            $time2 = strtotime($items2);
            if ($time1 == $time2) return 0;
            return ($time1 > $time2) ? 1 : -1;
        });

        return $collection;
    }

    /**
     * @param array $rateList
     * @return array
     */
    public function groupByCurrency(array $rateList)
    {
        $collection = collect($rateList);

        $collection = $collection->mapToGroups(function ($item, $key) {
            return [$item['currency'] => $item];
        })->toArray();

        return $collection;
    }
}

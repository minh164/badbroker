<?php
namespace App\Repositories\Calculation;

class CalculationRepository
{
    /**
     * Calculate highest revenue
     *
     * @param array $rateList
     * @param $amount
     * @return array|mixed
     */
    public function calculateBestRevenueForPeriod(array $rateList, $amount)
    {
        // sort ASC by date
        usort($rateList, function ($value1, $value2) {
            $time1 = strtotime($value1['date']);
            $time2 = strtotime($value2['date']);
            if ($time1 == $time2) return 0;
            return ($time1 > $time2) ? 1 : -1;
        });

        // pair each date with others
        $revenueItemList = [];
        foreach ($rateList as $key => $item) {
            // get others from item
            // except current item (+1)
            $others = array_slice($rateList, $key + 1);

            foreach ($others as $otherItem) {
                $buyDate = $item['date'];
                $sellDate = $otherItem['date'];
                $brokerFee = ( strtotime($sellDate) - strtotime($buyDate) ) / 86400;
                $total = ( $item['value'] * $amount / $otherItem['value'] ) - round($brokerFee);

                $revenueItemList[] = [
                    'total' => $total,
                    'revenue' => $total - $amount,
                    'buy_date' => $buyDate,
                    'sell_date' => $sellDate
                ];
            }
        }

        // get best revenue
        usort($revenueItemList, function ($revenue1, $revenue2) {
            if ($revenue1['revenue'] == $revenue2['revenue']) return 0;
            return ($revenue1['revenue'] < $revenue2['revenue']) ? 1 : -1;
        });
        $bestRevenue = $revenueItemList[0];

        return $bestRevenue;
    }
}

@if(!count($rateDateList))
    <p>Data not found...</p>
@else
    @php
        $currencyList = array_keys($rateCurrencyList);
    @endphp

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Date</th>
            @foreach($currencyList as $currency)
                <th scope="col">{{ $currency }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($rateDateList as $date => $rateItemList)
            <tr>
                <th scope="row">{{ date('m/d/Y', strtotime($date)) }}</th>
                @foreach($currencyList as $currency)
                    <td>{!! !empty($rateItemList[$currency]) ? $rateItemList[$currency]['value'] : 0 !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

    @foreach($bestRevenueList as $key => $bestRevenue)
        <p>
            Best revenue for {{ $key }}:
            {{ date('m/d/Y', strtotime($bestRevenue['buy_date'])) }} - {{ date('m/d/Y', strtotime($bestRevenue['sell_date'])) }}
            ( {{ number_format($bestRevenue['revenue'], 2) }}$ )
        </p>
    @endforeach
@endif

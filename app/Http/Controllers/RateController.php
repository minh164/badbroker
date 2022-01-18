<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataFromServiceRequest;
use App\Repositories\Calculation\CalculationRepository;
use App\Repositories\Formatter\RateFormatterRepository;
use App\Repositories\Rate\RateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    protected $rateRepo;
    protected $calculationRepo;
    protected $formatterRepo;

    public function __construct(
        RateRepositoryInterface $rateRepo,
        CalculationRepository $calculationRepo,
        RateFormatterRepository $formatterRepo
    )
    {
        $this->rateRepo = $rateRepo;
        $this->calculationRepo = $calculationRepo;
        $this->formatterRepo = $formatterRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'from_date' => 'numeric',
                'to_date' => 'numeric',
                'amount' => 'required|numeric'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'errors' => $validator->errors(),
                    'message' => 'Some fields is invalid!'
                ], 422);
            }

            $data = $validator->validated();

            // get rate list by date filter
            $rateList = $this->rateRepo->getListByDate($data);

            // format group by date
            $rateDateList = $this->formatterRepo->groupByDate($rateList);

            // format group by currency
            $rateCurrencyList = $this->formatterRepo->groupByCurrency($rateList);

            // calculate best revenue
            $bestRevenueList = [];
            foreach ($rateCurrencyList as $currency => $dataList) {
                $bestRevenueList[$currency] = $this->calculationRepo->calculateBestRevenueForPeriod($dataList, $data['amount']);
            }

            $view = view('rate.rate-table')->with(compact('rateDateList', 'bestRevenueList', 'rateCurrencyList'))->render();

            return response()->json([
                'status' => 'success',
                'data' => $view
            ]);
        }

        return view('rate.index');
    }

    /**
     * Store multi data from ExchangeRates.
     *
     * @param StoreDataFromServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeDataFromService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'days' => 'numeric|min:1|max:30',
            'symbols' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $result = $this->rateRepo->storeDataFromService($validator->validated());

        return response()->json(['total'=> $result]);
    }
}

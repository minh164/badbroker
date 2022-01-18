<?php
namespace App\Repositories\Rate;

interface RateRepositoryInterface
{
    // get rate pagination list
    public function getList(array $request);

    // get rate list by period
    public function getListByDate(array $request);
}

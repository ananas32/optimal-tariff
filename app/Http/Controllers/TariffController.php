<?php

namespace App\Http\Controllers;

use App\Operator;
use App\Tariff;

class TariffController extends Controller
{
    public function index(Operator $operator)
    {
        $tariff = new Tariff;
        $tariffs = $tariff->getTariffs();

        $data = [
            'title' => trans('page.tariffs'),
            'tariffs' => $tariffs,
            'operators' => $operator->getListOperator()
        ];

        return view('pages.tariffs', $data);
    }


    public function operatorTariffs($operator)
    {
        $operators = new Operator;
        $tariff = new Tariff;
        $tariffs = $tariff->getOperatorTariff($operator);

        $data = [
            'title' => $operator,
            'tariffs' => $tariffs,
            'operator' => $operator,
            'operators' => $operators->getListOperator()
        ];

        return view('pages.tariffs', $data);
    }

    public function compare($t1, $t2)
    {
        $operator = new Tariff();

        $data = [
            'op1' => $operator->getTariff($t1),
            'op2' => $operator->getTariff($t2),
        ];
//        echo $t1. ' | ' .$t2;
//        echo "kurwa";
        return view('pages.compare', $data);
    }

}

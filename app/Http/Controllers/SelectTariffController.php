<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectTariffController extends Controller
{
    public function index(Operator $operator)
    {

        $data = [
            'operatorList' => $operator->getListOperator()
        ];

        return view('pages.select-tariff', $data);
    }

}

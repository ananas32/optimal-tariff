<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index(Operator $operator)
    {
        $data = [
            'title' => trans('page.tariffs'),
            'operators' => $operator->getListOperator()
        ];

        return view('pages.tariffs', $data);
    }


    public function operatorTariffs($operator)
    {
        echo $operator;
    }

}

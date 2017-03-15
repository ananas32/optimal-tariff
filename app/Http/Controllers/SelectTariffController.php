<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
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

    public function getOperatorList(Operator $operator)
    {
        $id = Input::get('list_operator');
        $selectList = $operator->getSelectListOperator($id);

        return Response::json($selectList);
    }
}

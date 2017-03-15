<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function getSearchTariffSelectOption(Request $request)
    {
        $validator = Validator::make($request->all(),
            array(
                'list_operator' => 'required|numeric',
                'list_operator_2' => 'numeric',
                'costs' => 'required|numeric'
            )
        );
        if($validator->fails())
        {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }
        else
        {
            return response()->json([
                'message' => "Message is create)"
            ]);
        }
    }
}

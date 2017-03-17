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
                'costs' => 'required|numeric',
                'select_1_1' => 'required_without_all:select_2_1,',
                'select_1_2' => 'required_unless:select_1_1,',
                'select_1_3' => 'required_unless:select_1_2,',

                'select_2_1' => '',
                'select_2_2' => 'required_unless:select_2_1,',
                'select_2_3' => 'required_unless:select_2_2,',

                'select_3_1' => '',
                'select_3_2' => 'required_unless:select_3_1,',
                'select_3_3' => 'required_unless:select_3_2,',

                'select_4_1' => '',
                'select_4_2' => 'required_unless:select_4_1,',
                'select_4_3' => 'required_unless:select_4_2,',

                'select_5_1' => '',
                'select_5_2' => 'required_unless:select_5_1,',

                'select_6_1' => '',
                'select_6_2' => 'required_unless:select_6_1,',

                'select_7_1' => '',
                'select_7_2' => 'required_unless:select_7_1,'
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
                'message' => "From validation is complete)"
            ]);
        }
    }
}

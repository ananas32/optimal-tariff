<?php

namespace App\Http\Controllers;

use App\FormDropdown;
use App\Operator;
use App\Http\Controllers\Traits\Calculate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SelectTariffController extends Controller
{
    public function index(Operator $operator, Request $request)
    {
        $formDropdowns = FormDropdown::get();

        $countCall = $formDropdowns->where('dropdown_text_id', 1)->pluck('text_dropdown', 'id');
        $countCall->prepend ('---------------', '');

        $lengthCall = $formDropdowns->where('dropdown_text_id', 2)->pluck('text_dropdown', 'id');
        $lengthCall->prepend ('---------------', '');

        $freUse = $formDropdowns->where('dropdown_text_id', 3)->pluck('text_dropdown', 'id');
        $freUse->prepend ('---------------', '');

        $refPacket = $formDropdowns->where('dropdown_text_id', 4)->pluck('text_dropdown', 'id');
        $refPacket->prepend ('---------------', '');

        $data = [
            'refPacket' => $refPacket,
            'freUse' => $freUse,
            'lengthCall' => $lengthCall,
            'countCall' => $countCall,
            'operatorList' => $operator->getListOperator()
        ];

        if($request->cookie('user_manual')) {
            $data['user_manual'] = $request->cookie('user_manual');
        } else $data['user_manual'] = 0;

        return view('pages.select-tariff', $data);
    }

    public function skipUserManual()
    {
        return response('Delete visible manual')->cookie(
            'user_manual', true, 1
        );
    }

    public function getOperatorList(Operator $operator)
    {
        $id = Input::get('list_operator');
        $selectList = $operator->getSelectListOperator($id);
        $selectList->pluck('operator_name', 'id');

        return Response::json($selectList);
    }

    public function getSearchTariffSelectOption(Request $request)
    {
        $validator = Validator::make($request->all(),
            array(
                'list_operator' => 'required|numeric',
                'list_operator_2' => 'numeric',
                'costs' => 'required|numeric',
                'select_1_1' => 'required_without_all:select_2_1,select_3_1,select_4_1,select_5_1,select_6_1,select_7_1',
                'select_1_2' => 'required_unless:select_1_1,',
                'select_1_3' => 'required_unless:select_1_2,',

//                'select_2_1' => '',
                'select_2_2' => 'required_unless:select_2_1,',
                'select_2_3' => 'required_unless:select_2_2,',

//                'select_3_1' => '',
                'select_3_2' => 'required_unless:select_3_1,',
                'select_3_3' => 'required_unless:select_3_2,',

//                'select_4_1' => '',
                'select_4_2' => 'required_unless:select_4_1,',
                'select_4_3' => 'required_unless:select_4_2,',

//                'select_5_1' => '',
                'select_5_2' => 'required_unless:select_5_1,',

//                'select_6_1' => '',
                'select_6_2' => 'required_unless:select_6_1,',

//                'select_7_1' => '',
                'select_7_2' => 'required_unless:select_7_1,'
            )
        );
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ]);
        } else {
            $calculate = new Calculate;
            $calculate->test();
            die($calculate->test());
            if($request->list_operator_2){
                die ($request->list_operator_2);
                // поиск на 2 тарифа
            } else {
                // поиск на 1 тариф
            }
            $tariffInfo = [
                'one' => 'Найкращий тариф',
                'two' => 'Нічо так тариф',
                'tru' => 'Тож нічо такий тариф',
                'four' => 'Хєроватінький тариф'
            ];

            $html = view('layouts.includes.result-search')
                ->with([
                    'tariffInfo' => $tariffInfo,
                    'costs' => $request->costs
                ])
                ->render();

            return response()->json([
                'html' => $html
            ]);
        }
    }
}

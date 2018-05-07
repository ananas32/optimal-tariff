<?php

namespace App\Http\Controllers;

use App\FormDropdown;
use App\Operator;
use App\Tariff;
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

        $countCall = $formDropdowns->where('dropdown_text_id', 1)->pluck('text_dropdown', 'value');
        $countCall->prepend ('---------------', '');

        $lengthCall = $formDropdowns->where('dropdown_text_id', 2)->pluck('text_dropdown', 'value');
        $lengthCall->prepend ('---------------', '');

        $freUse = $formDropdowns->where('dropdown_text_id', 3)->pluck('text_dropdown', 'value');
        $freUse->prepend ('---------------', '');

        $refPacket = $formDropdowns->where('dropdown_text_id', 4)->pluck('text_dropdown', 'value');
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
            $list_operator = $request->list_operator;
            $list_operator_2 = $request->list_operator_2;
            $select_1_1 = $request->select_1_1;
            $select_1_2 = $request->select_1_2;
            $select_1_3 = $request->select_1_3;
            $select_2_1 = $request->select_2_1;
            $select_2_2 = $request->select_2_2;
            $select_2_3 = $request->select_2_3;
            $select_3_1 = $request->select_3_1;
            $select_3_2 = $request->select_3_2;
            $select_3_3 = $request->select_3_3;
            $select_4_1 = $request->select_4_1;
            $select_4_2 = $request->select_4_2;
            $select_4_3 = $request->select_4_3;
            $select_5_1 = $request->select_5_1;
            $select_5_2 = $request->select_5_2;
            $select_6_1 = $request->select_6_1;
            $select_6_2 = $request->select_6_2;
            $select_7_1 = $request->select_7_1;
            $select_7_2 = $request->select_7_2;
            $costs = $request->costs;

            $kyivstar = $lifecell = $vodafone = $fixNumber = $megabute = $sms = $mms = 0;

            $arrayValue = [];

            if ($select_1_1){
                $arrayValue[1] = $select_1_1 * $select_1_2 * $select_1_3;
            }

            if ($select_2_1) {
                $arrayValue[2] = $select_2_1 * $select_2_2 * $select_2_3;
            }

            if ($select_3_1) {
                $arrayValue[3] = $select_3_1 * $select_3_2 * $select_3_3;
            }

            if ($select_4_1) {
                $fixNumber = $select_4_1 * $select_4_2 * $select_4_3;
            }

            if ($select_5_1) {
                $megabute = $select_5_1 * $select_5_2;
            }

            if ($select_6_1) {
                $sms = $select_6_1 * $select_6_2;
            }

            if($select_7_1) {
                $mms = $select_7_1 * $select_7_2;
            }

            $calculate = new Calculate;

            if($list_operator_2){
                // поиск на 2 тарифа
                die ($list_operator_2);
            } else {
                // поиск на 1 тариф
                $tariffs = Tariff::where('operator_id', $list_operator)->get();
                $operators = Operator::where('visible', 1)->get();
                $networkCall = false;
                $otherCalls = false;

                foreach ($operators as $operator) {
                    if($operator->id == $request->list_operator) {
                        $networkCall = (isset($arrayValue[$operator->id])) ? $arrayValue[$operator->id] : false;
                    } else {
                        $otherCalls += (isset($arrayValue[$operator->id])) ? $arrayValue[$operator->id] : false ;
                    }
                }

                foreach ($tariffs as $tariff) {

                    $interimAmount = 0;

                    if ($networkCall) {
                        $result = $calculate->calls($tariff->networkCalls, $networkCall);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_minute'];
                        }
                    }

                    if ($otherCalls) {
                        $result = $calculate->calls($tariff->otherCalls, $otherCalls);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_minute'];
                        }
                    }

                    if ($select_4_1) {
                        $result = $calculate->calls($tariff->fixedCall, $fixNumber);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_minute'];
                        }
                    }

                    if ($select_5_1) {
                        $result = $calculate->package($tariff->internetPackages, $megabute);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_package'];
                        }
                    }

                    if ($select_6_1) {
                        $result = $calculate->message($tariff->messages, $sms);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_message'];
                        }
                    }

                    if ($select_7_1) {
                        $result = $calculate->message($tariff->mmsMessage, $mms);
                        if($result['unlimited']) {
                            $interimAmount += 0;
                        } else {
                            $interimAmount += $result['price_by_tariff_message'];
                        }
                    }

                    $price = $interimAmount + $tariff->price;

                    $tariff->interimAmount = round($price, 2);
                    
                    if($request->costs < $tariff->interimAmount){
                        $tariff->class = 'label-warning';
                        $tariff->recommendation = 'Не советуем';
                    } elseif ($request->costs > $tariff->interimAmount + 10) {
                        $tariff->class = 'label-success';
                        $tariff->recommendation = 'Рекомендуем';
                    } else {
                        $tariff->class = 'label-info';
                        $tariff->recommendation = 'Будет луче';
                    }
                }
            }

            $html = view('layouts.includes.result-search')
                ->with([
                    'tariffs' => $tariffs
                ])
                ->render();

            return response()->json([
                'html' => $html
            ]);
        }
    }
}

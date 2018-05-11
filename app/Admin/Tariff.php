<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Tariff;

AdminSection::registerModel(Tariff::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Тарифы');

    $model->onDisplay(function () {

        $display = AdminDisplay::datatables()->with('listRegions');

        $display->setColumns([
            AdminColumn::text('id')->setLabel('ID'),

            AdminColumn::text('tariffNames.tariff_name', 'Название тарифа')->append(AdminColumn::filter('tariff_name_id'))->setOrderable(false),

            AdminColumn::text('otherCalls.name', 'Звонки на другие сети')->setOrderable(false),

            AdminColumn::text('internetPackages.name', 'Интернет пакеты')->setOrderable(false),
            
            AdminColumn::custom('Оператор')
                ->setHtmlAttribute('class', 'text-center')
                ->setCallback(function ($instance) {
                    return '<div class="color-item" style="background:'.$instance->operators->operator_color.';">
                                '.$instance->operators->operator_name.'
                            </div>';
                }),

            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::lists('listRegions.name_region', 'Регионы')
        ]);

        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {

        $form = AdminForm::panel();

        $form->addBody(
            AdminFormElement::select('network_call_id', 'Звонки в сети')
                ->setModelForOptions('App\Call')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('other_call_id', 'Звонки на другие сети')
                ->setModelForOptions('App\Call')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('fixed_call_id', 'Звонки на городские номера')
                ->setModelForOptions('App\Call')
                ->setDisplay('name')
                ->required(),


            AdminFormElement::select('message_id', 'Сообщения СМС')
                ->setModelForOptions('App\Message')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('mms_message_id', 'Сообщения ММС')
                ->setModelForOptions('App\Message')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('internet_package_id', 'Пакеты (MByte)')
                ->setModelForOptions('App\InternetPackage')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('tariff_name_id', 'Название тарифа')
                ->setModelForOptions('App\TariffName')
                ->setDisplay('tariff_name')
                ->required(),

            AdminFormElement::select('operator_id', 'Оператор')
                ->setModelForOptions('App\Operator')
                ->setDisplay('operator_name')
                ->required(),

            AdminFormElement::select('regular_payment_id', 'Оплата за период времени')
                ->setModelForOptions('App\RegularPayment')
                ->setDisplay('name_payment')
                ->required(),

            AdminFormElement::text('link', 'Ссылка на тариф')->setValidationRules(['name' => 'required|string|min:2|max:190']),
            AdminFormElement::text('price', 'Цена')->setValidationRules(['name' => 'required|numeric']),
            AdminFormElement::multiselect('regions', 'Регионы')
                ->setModelForOptions('App\Region')
                ->setDisplay('name_region'),
            AdminFormElement::checkbox('active', 'Активность')
        );

        return $form;
    });

});

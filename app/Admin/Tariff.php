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
//            AdminColumn::text('name')->setLabel('Название'),
//            AdminColumn::custom()->setLabel('Безлимит')->setCallback(function ($instance) {
//                return $instance->unlimited ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
//            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
//            AdminColumn::text('tariff_minute')->setLabel('Минут в тарифе'),
//            AdminColumn::text('quantity')->setLabel('Количество'),
//            AdminColumn::text('price')->setLabel('Цена'),
            AdminColumn::lists('listRegions.name_region', 'Регионы')
        ]);

        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {

        $form = AdminForm::panel();

        $form->addBody(
            AdminFormElement::select('call_id', 'Звонки')
                ->setModelForOptions('App\Call')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('message_id', 'Сообщения')
                ->setModelForOptions('App\Message')
                ->setDisplay('name')
                ->required(),

            AdminFormElement::select('internet_package_id', 'Пакеты (торбы)')
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


//            $table->integer('call_id')->unsigned();
//            $table->integer('message_id')->unsigned();
//            $table->integer('internet_package_id')->unsigned();
//            $table->integer('tariff_name_id')->unsigned();
//            $table->string('link', 255);
//            $table->integer('operator_id')->unsigned();
//            $table->integer('regular_payment_id')->unsigned();
//            $table->integer('price');
//            $table->boolean('active')->default(false);
//            $table->softDeletes();
//            AdminFormElement::checkbox('unlimited', 'Безлимит'),
//            AdminFormElement::text('tariff_minute', 'Минут в тарифе')->setValidationRules(['tariff_minute' => 'numeric']),
//            AdminFormElement::text('quantity', 'Количество минут')->setValidationRules(['quantity' => 'numeric']),
//            AdminFormElement::text('price', 'Цена')->setValidationRules(['price' => 'numeric'])
        );

        return $form;
    });

});

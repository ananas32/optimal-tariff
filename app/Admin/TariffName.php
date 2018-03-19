<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TariffName;

AdminSection::registerModel(TariffName::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Названия тарифов');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
            AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('tariff_name')->setLabel('Название тарифа'),
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('tariff_name', 'Название тарифа')->setValidationRules(['name' => 'required|min:2|max:190']),
            AdminFormElement::checkbox('active', 'Активность')
        );
    });

});

<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\RegularPayment;

AdminSection::registerModel(RegularPayment::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Регулярная оплата');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
            AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('name_payment')->setLabel('Платёж')
        ]);

        return $display;
    });

    $model->onCreateAndEdit(function() {

        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name_payment', 'Платёж')->setValidationRules(['name' => 'required|min:2|max:190'])
        );

        return $form;
    });

});

<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Message;

AdminSection::registerModel(Message::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('СМС и ММС');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::custom()->setLabel('Безлимит')->setCallback(function ($instance) {
                return $instance->unlimited ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('tariff_message')->setLabel('Сообщений в тарифе'),
            AdminColumn::text('quantity')->setLabel('Количество'),
            AdminColumn::text('price')->setLabel('Цена'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Название')->setValidationRules(['name' => 'required|string|min:2|max:190']),
            AdminFormElement::checkbox('unlimited', 'Безлимит'),
            AdminFormElement::text('tariff_message', 'Сообщений в тарифе')->setValidationRules(['tariff_message' => 'numeric']),
            AdminFormElement::text('quantity', 'Количество')->setValidationRules(['quantity' => 'numeric']),
            AdminFormElement::text('price', 'Цена')->setValidationRules(['price' => 'numeric'])
        );
    });

});

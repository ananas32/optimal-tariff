<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Operator;

AdminSection::registerModel(Operator::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Операторы');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('operator_name')->setLabel('Название оператора')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::text('operator_name', 'Название оператора')->required(),
            AdminFormElement::text('operator_color', 'Цвет оператора')->required(),
            AdminFormElement::image('operator_image', 'Изображение')
        );
    });

})
    ->addMenuPage(Operator::class, 310)
    ->setIcon('fa fa-user-md');
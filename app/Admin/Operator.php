<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Operator;

AdminSection::registerModel(Operator::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Operators');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Visible')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('operator_name')->setLabel('Operator name')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Visible'),
            AdminFormElement::text('operator_name', 'Operator name')->required(),
            AdminFormElement::text('operator_color', 'Operator color')->required(),
            AdminFormElement::image('operator_image', 'Operator image')
        );
    });

})
    ->addMenuPage(Operator::class, 310)
    ->setIcon('fa fa-user-md');
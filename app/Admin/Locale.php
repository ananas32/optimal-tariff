<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Locale;

AdminSection::registerModel(Locale::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Языки');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('code')->setLabel('Код языка'),
            AdminColumn::text('name')->setLabel('Название'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('active', 'Активность'),
            AdminFormElement::text('code', 'Код языка')->required(),
            AdminFormElement::text('name', 'Название')->required()
        );
    });

})
    ->addMenuPage(Locale::class, 350)
    ->setIcon('fa fa-language');
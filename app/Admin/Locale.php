<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Locale;

AdminSection::registerModel(Locale::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Language');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Active')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('code')->setLabel('Code language'),
            AdminColumn::text('name')->setLabel('Name language'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('active', 'Active'),
            AdminFormElement::text('code', 'Code language')->required(),
            AdminFormElement::text('name', 'Name language')->required()
        );
    });

})
    ->addMenuPage(Locale::class, 350)
    ->setIcon('fa fa-language');
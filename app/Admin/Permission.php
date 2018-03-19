<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Permission;

AdminSection::registerModel(Permission::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Права доступа');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('name')->setLabel('Псевдоним'),
            AdminColumn::text('display_name')->setLabel('Название'),
            AdminColumn::text('description')->setLabel('Описание'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Псевдоним')->required(),
            AdminFormElement::text('display_name', 'Название')->required(),
            AdminFormElement::textarea('description', 'Описание')->required()
        );
        return $form;
    });

});
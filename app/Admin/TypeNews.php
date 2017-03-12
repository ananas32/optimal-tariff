<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TypeNews;

AdminSection::registerModel(TypeNews::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
    $model->disableDeleting();
    $model->disableCreating();
    $model->setTitle('Types news');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::text('type_news')->setLabel('Type news')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('type_news', 'Type news')->required()
        );
    });

});
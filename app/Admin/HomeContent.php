<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\HomeContent;

AdminSection::registerModel(HomeContent::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
    $model->disableDeleting();
    $model->disableCreating();
    $model->setTitle('Home content');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::text('title')->setLabel('Title block')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Title block')->required(),
            AdminFormElement::ckeditor('content', 'Content block')->required()
        );
    });

})
    ->addMenuPage(HomeContent::class, 410)
    ->setIcon('fa fa-file-text');
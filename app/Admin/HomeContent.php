<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\HomeContent;

AdminSection::registerModel(HomeContent::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
    $model->disableDeleting();
    $model->disableCreating();
    $model->setTitle('Контетн главной');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::text('title')->setLabel('Название блока')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Название блока')->required(),
            AdminFormElement::ckeditor('content', 'Контент блока')->required()
        );
    });

})
    ->addMenuPage(HomeContent::class, 410)
    ->setIcon('fa fa-file-text');
<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TextHeader;

AdminSection::registerModel(TextHeader::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
//    $model->setTitle('Header text');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Visible')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('initials')->setLabel('Initials'),
            AdminColumn::text('random_text')->setLabel('Text'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Visible'),
            AdminFormElement::text('initials', 'Initials')->required(),
            AdminFormElement::textarea('random_text', 'Text')->required()
        );
    });

})
    ->addMenuPage(TextHeader::class, 400)
    ->setIcon('fa fa-random');
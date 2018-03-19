<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TextHeader;

AdminSection::registerModel(TextHeader::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Текст в шапке');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('initials')->setLabel('Инициалы'),
            AdminColumn::text('random_text')->setLabel('Текст'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::text('initials', 'Инициалы')->required(),
            AdminFormElement::textarea('random_text', 'Текст')->required()
        );
    });

})
    ->addMenuPage(TextHeader::class, 400)
    ->setIcon('fa fa-random');
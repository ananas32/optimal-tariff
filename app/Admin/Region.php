<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Region;

AdminSection::registerModel(Region::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
//    $model->disableCreating();
    $model->setTitle('Regions');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Active')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('name_region')->setLabel('Region name')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('active', 'Active'),
            AdminFormElement::text('name_region', 'Region name')->required()
        );
    });

})
    ->addMenuPage(Region::class, 350)
    ->setIcon('fa fa-map-marker');
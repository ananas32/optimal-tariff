<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Region;

AdminSection::registerModel(Region::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
//    $model->disableCreating();
    $model->setTitle('Регионы');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->active ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('name_region')->setLabel('Название региона'),
            AdminColumn::text('code')->setLabel('Код региона')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('active', 'Активность'),
            AdminFormElement::text('code', 'Код региона')->setValidationRules(['code' => 'required|string|min:2|max:10|unique:regions']),
            AdminFormElement::text('name_region', 'Название регона')->required()
        );
    });

})
    ->addMenuPage(Region::class, 350)
    ->setIcon('fa fa-map-marker');
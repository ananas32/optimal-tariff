<?php

use Illuminate\Pagination\PaginationServiceProvider;
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Role;

AdminSection::registerModel(Role::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Роли');

    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name')->setLabel('Псевдоним'),
            AdminColumn::text('display_name')->setLabel('Название'),
            AdminColumn::text('description')->setLabel('Описание'),
        ]);
        $display->paginate(30);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::multiselect('thepermits', 'Права доступа')->setModelForOptions('App\Permission')->setDisplay('display_name'),
            AdminFormElement::text('name', 'Псевдоним')->required(),
            AdminFormElement::text('display_name', 'Название')->required(),
            AdminFormElement::textarea('description', 'Описание')->required()
        );
        return $form;
    });

});
//    ->addMenuPage(Role::class, 0)
//    ->setIcon('fa fa-graduation-cap');
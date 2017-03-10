<?php
/**
 * Created by PhpStorm.
 * User: Vitalik
 * Date: 02.10.2016
 * Time: 19:40
 */
use Illuminate\Pagination\PaginationServiceProvider;
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Role;

AdminSection::registerModel(Role::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Roles');

    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name')->setLabel('Name'),
            AdminColumn::text('display_name')->setLabel('Display name'),
            AdminColumn::text('description')->setLabel('Description name'),
        ]);
        $display->paginate(10);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::multiselect('thepermits', 'Права доступа')->setModelForOptions('App\Permission')->setDisplay('display_name'),
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('display_name', 'Display name')->required(),
            AdminFormElement::textarea('description', 'Description name')->required()
        );
        return $form;
    });

});
//    ->addMenuPage(Role::class, 0)
//    ->setIcon('fa fa-graduation-cap');
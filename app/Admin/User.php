<?php
/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\User;
AdminSection::registerModel(User::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Users');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('name')->setLabel('Name'),
            AdminColumn::text('surname')->setLabel('Surname'),
            AdminColumn::email('email')->setLabel('Email'),
            AdminColumn::text('phone')->setLabel('Phone'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Name User')->required(),
            AdminFormElement::text('surname', 'surname')->required(),
            AdminFormElement::text('email', 'Email')->required()->unique(),
            AdminFormElement::text('phone', 'Phone')->required(),
            AdminFormElement::multiselect('theroles', 'Роли')->setModelForOptions('App\Role')->setDisplay('name')
        );
        return $form;
    });
});
//    ->addMenuPage(User::class, 0)
//    ->setIcon('fa fa-user');
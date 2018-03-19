<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\User;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Пользователи');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('name')->setLabel('Имя'),
            AdminColumn::text('surname')->setLabel('Фамилия'),
            AdminColumn::email('email')->setLabel('Емейл'),
        ]);
        return $display;
    });

    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::text('surname', 'Фамилия')->required(),
            AdminFormElement::text('email', 'Email')->required()->unique(),
            AdminFormElement::multiselect('theroles', 'Роли')->setModelForOptions('App\Role')->setDisplay('name')
        );
        return $form;
    });
});

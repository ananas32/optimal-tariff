<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Page;

AdminSection::registerModel(Page::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
//    $model->disableCreating();
    $model->setTitle('Страницы');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
            AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('order')->setLabel('Порядок'),
            AdminColumn::text('title')->setLabel('Название')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('order', 'Порядок')->required(),
            AdminFormElement::text('slug', 'Алиас')->setValidationRules(['code' => 'required|string|min:2|max:50|unique:pages']),
            AdminFormElement::text('title', 'Заголовок')->required(),

            AdminFormElement::text('meta_title', 'Seo название')->required(),
            AdminFormElement::text('meta_keywords', 'Ключевые слова (meta)')->required(),
            AdminFormElement::textarea('meta_description', 'Описание (meta)')->required()
        );
    });

})
    ->addMenuPage(Page::class, 350)
    ->setIcon('fa fa-map-marker');
<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\News;
use App\TypeNews;

AdminSection::registerModel(News::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Новости');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('type_news_id')->setLabel('Тип новости'),
            AdminColumn::text('title_news')->setLabel('Заголовок новсти'),
            AdminColumn::text('short_news')->setLabel('Короткий врез'),
            AdminColumn::image('image')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::select('type_news_id', 'Тип новости')->setModelForOptions(new TypeNews)->setDisplay(function($typeNews) {
                return $typeNews->type_news;
            }),
            AdminFormElement::text('slug', 'Псевдоним')->required()->unique(),
            AdminFormElement::text('title_news', 'Заголовок новости')->required(),
            AdminFormElement::textarea('short_news', 'Короткий врез')->required(),
            AdminFormElement::ckeditor('full_news', 'Контент')->required(),
            AdminFormElement::image('image', 'Изображение')->required()
        );
    });

});
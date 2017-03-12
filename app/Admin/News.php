<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\News;
use App\TypeNews;

AdminSection::registerModel(News::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Site News');

    $model->onDisplay(function () {
        $display = AdminDisplay::table();

        $display->setColumns([
            AdminColumn::custom()->setLabel('Visible')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('title_news')->setLabel('Title News'),
            AdminColumn::text('short_news')->setLabel('Short News'),
            AdminColumn::image('image')->setLabel('Image news')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Visible'),
            AdminFormElement::select('type_news_id', 'Type news')->setModelForOptions(new TypeNews)->setDisplay(function($typeNews) {
                return $typeNews->type_news;
            }),
            AdminFormElement::text('title_news', 'Title news')->required(),
            AdminFormElement::textarea('short_news', 'Short news')->required(),
            AdminFormElement::ckeditor('full_news', 'Title news')->required(),
            AdminFormElement::image('image', 'Image news')->required()
        );
    });

});
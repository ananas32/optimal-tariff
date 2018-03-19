<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Slider;

AdminSection::registerModel(Slider::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Слайдер');

    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('order', 'ASC');
        });
        $display->setColumns([
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('order')->setLabel('Порядок'),
            AdminColumn::image('image')->setLabel('Изображение'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::text('order', 'Порядок')->required(),
            AdminFormElement::image('image', 'Изображение')->required()
        );
    });

})
    ->addMenuPage(Slider::class, 300)
    ->setIcon('fa fa-sliders');
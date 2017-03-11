<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Slider;

AdminSection::registerModel(Slider::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

    $model->setTitle('Slider');

    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('order', 'ASC');
        });
        $display->setColumns([
            AdminColumn::custom()->setLabel('Visible')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('order')->setLabel('Display order'),
            AdminColumn::image('image')->setLabel('Image slider'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Visible on site'),
            AdminFormElement::text('order', 'Display order')->required(),
            AdminFormElement::image('image', 'Image slider')->required()
        );
    });

})
    ->addMenuPage(Slider::class, 300)
    ->setIcon('fa fa-sliders');
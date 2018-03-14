<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\InternetPackage;

AdminSection::registerModel(InternetPackage::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Интернет пакеты');

	$model->onDisplay(function () {
		$display = AdminDisplay::datatables();

		$display->setColumns([
			AdminColumn::text('name')->setLabel('Название для звонка'),
			AdminColumn::custom()->setLabel('Безлимит')->setCallback(function ($instance) {
				return $instance->unlimited ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
			})->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::text('tariff_minute')->setLabel('Минут в тарифе'),
			AdminColumn::text('quantity')->setLabel('Количество'),
			AdminColumn::text('price')->setLabel('Название для звонка'),
		]);
		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {
		return $form = AdminForm::panel()->addBody(
			AdminFormElement::checkbox('unread', 'Visible'),
			AdminFormElement::text('username', 'User name')->setReadonly(true),
			AdminFormElement::text('email', 'email')->setReadonly(true),
			AdminFormElement::textarea('message', 'Message')->setReadonly(true),
			AdminFormElement::textarea('answer', 'Answer'),
			AdminFormElement::text('ip_address', 'Ip address')->required()
		);
	});

});

$table->string('name');
$table->boolean('unlimited');
$table->string('tariff_minute');
$table->string('quantity');
$table->string('price');
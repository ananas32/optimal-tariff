<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Call;

AdminSection::registerModel(Call::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Звонки');

	$model->onDisplay(function () {
		$display = AdminDisplay::datatables();

		$display->setColumns([
			AdminColumn::custom()->setLabel('Visible')->setCallback(function ($instance) {
				return $instance->unread ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
			})->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::email('email')->setLabel('User email'),
			AdminColumn::text('username')->setLabel('User name')
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
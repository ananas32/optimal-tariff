<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\GuestBook;

AdminSection::registerModel(GuestBook::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Гостевая книга');

	$model->onDisplay(function () {
		$display = AdminDisplay::table();

		$display->setColumns([
			AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
				return $instance->unread ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
			})->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::email('email')->setLabel('email'),
			AdminColumn::text('username')->setLabel('Имя')
		]);
		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {
		return $form = AdminForm::panel()->addBody(
			AdminFormElement::checkbox('unread', 'Активность'),
			AdminFormElement::text('username', 'Имя')->setReadonly(true),
			AdminFormElement::text('email', 'email')->setReadonly(true),
			AdminFormElement::textarea('message', 'Сообщение')->setReadonly(true),
			AdminFormElement::textarea('answer', 'Ответ'),
			AdminFormElement::text('ip_address', 'IР адресс')->required()
		);
	});

})
	->addMenuPage(GuestBook::class, 500)
	->setIcon('fa fa-address-book')
	->addBadge(function() {
		$count = GuestBook::where('unread', false)->count();
		if ($count > 0) {
			return $count;
		}
	}, ['class' => 'label-warning']);
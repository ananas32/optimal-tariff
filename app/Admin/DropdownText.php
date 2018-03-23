<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\DropdownText;

AdminSection::registerModel(DropdownText::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Списки');

	$model->onDisplay(function () {

		$display = AdminDisplay::datatables();

		$display->setColumns([
			AdminColumn::text('id')->setLabel('ID'),
			AdminColumn::text('name', 'Название списка'),
		]);

		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {

		$form = AdminForm::panel();

		$form->addBody(
			AdminFormElement::text('name', 'Список')->setValidationRules(['name' => 'required'])
		);

		return $form;
	});

});
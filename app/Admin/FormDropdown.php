<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\FormDropdown;

AdminSection::registerModel(FormDropdown::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Випадные списки для формы');

	$model->onDisplay(function () {

		$display = AdminDisplay::datatables();

		$display->setColumns([
			AdminColumn::text('id')->setLabel('ID'),
			AdminColumn::text('fromDropdown.name', 'Название списка')->append(AdminColumn::filter('dropdown_text_id')),
			AdminColumn::text('text_dropdown', 'Випадной текст'),
			AdminColumn::text('value', 'Значение'),
		]);

		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {

		$form = AdminForm::panel();

		$form->addBody(
			AdminFormElement::select('dropdown_text_id', 'Список')
				->setModelForOptions('App\DropdownText')
				->setDisplay('name')
				->required(),
			AdminFormElement::text('text_dropdown', 'Випадной текст')->setValidationRules(['name' => 'required|string|min:1|max:190']),
			AdminFormElement::text('value', 'Значение')
		);

		return $form;
	});

});
<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\InternetPackage;

AdminSection::registerModel(InternetPackage::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Интернет пакеты');

	$model->onDisplay(function () {
		$display = AdminDisplay::datatables();

		$display->setColumns([
			AdminColumn::text('name')->setLabel('Название'),
			AdminColumn::custom()->setLabel('Безлимит')->setCallback(function ($instance) {
				return $instance->unlimited ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
			})->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
			AdminColumn::text('tariff_package')->setLabel('Мегабайт в тарифе'),
			AdminColumn::text('quantity')->setLabel('Количество'),
			AdminColumn::text('price')->setLabel('Цена'),
		]);
		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {
		return AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Название')->setValidationRules(['name' => 'required|string|min:2|max:190']),
            AdminFormElement::checkbox('unlimited', 'Безлимит'),
            AdminFormElement::text('tariff_package', 'Мегабайт в тарифе')->setValidationRules(['tariff_package' => 'numeric']),
            AdminFormElement::text('quantity', 'Количество мегабайт')->setValidationRules(['quantity' => 'numeric']),
            AdminFormElement::text('price', 'Цена')->setValidationRules(['price' => 'numeric'])
		);
	});

});

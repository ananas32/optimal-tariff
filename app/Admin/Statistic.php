<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Statistic;

AdminSection::registerModel(Statistic::class, function (ModelConfiguration $model) {

//    $model->enableAccessCheck();

	$model->setTitle('Статистика');

	$model->onDisplay(function () {

		$display = AdminDisplay::datatables();
//			->with('listRegions');

		$display->setColumns([
			AdminColumn::text('id')->setLabel('ID'),

			AdminColumn::custom('Оператор1')
				->setHtmlAttribute('class', 'text-center')
				->setCallback(function ($instance) {
					return '<div class="color-item" style="background:'.$instance->firstOperator->operators->operator_color.';">
                                '.$instance->firstOperator->operators->operator_name.'
                            </div>';
			}),

			AdminColumn::text('firstTariff.tariffNames.tariff_name', 'Название тарифа1')->append(AdminColumn::filter('tariff_name_id'))->setOrderable(false),

			AdminColumn::custom('Оператор2')
				->setHtmlAttribute('class', 'text-center')
				->setCallback(function ($instance) {
					if ($instance->secondOperator) {

						return '<div class="color-item" style="background:'.$instance->secondOperator->operators->operator_color.';">
									'.$instance->secondOperator->operators->operator_name.'
								</div>';
					}
			}),

			AdminColumn::text('secondTariff.tariffNames.tariff_name', 'Название тарифа2')->append(AdminColumn::filter('tariff_name_id'))->setOrderable(false),

			AdminColumn::text('estimated_costs')->setLabel('Предложеные затраты'),
			AdminColumn::text('current_expenses')->setLabel('Текущие затраты'),
		]);

		return $display;
	});
	// Create And Edit
	$model->onCreateAndEdit(function() {

		$form = AdminForm::panel();

		$form->addBody(
			AdminFormElement::select('network_call_id', 'Звонки в сети')
				->setModelForOptions('App\Call')
				->setDisplay('name')
				->required(),

			AdminFormElement::select('other_call_id', 'Звонки на другие сети')
				->setModelForOptions('App\Call')
				->setDisplay('name')
				->required(),

			AdminFormElement::select('fixed_call_id', 'Звонки на городские номера')
				->setModelForOptions('App\Call')
				->setDisplay('name')
				->required(),


			AdminFormElement::select('message_id', 'Сообщения СМС')
				->setModelForOptions('App\Message')
				->setDisplay('name')
				->required(),

			AdminFormElement::select('mms_message_id', 'Сообщения ММС')
				->setModelForOptions('App\Message')
				->setDisplay('name')
				->required(),

			AdminFormElement::select('internet_package_id', 'Пакеты (MByte)')
				->setModelForOptions('App\InternetPackage')
				->setDisplay('name')
				->required(),

			AdminFormElement::select('tariff_name_id', 'Название тарифа')
				->setModelForOptions('App\TariffName')
				->setDisplay('tariff_name')
				->required(),

			AdminFormElement::select('operator_id', 'Оператор')
				->setModelForOptions('App\Operator')
				->setDisplay('operator_name')
				->required(),

			AdminFormElement::select('regular_payment_id', 'Оплата за период времени')
				->setModelForOptions('App\RegularPayment')
				->setDisplay('name_payment')
				->required(),

			AdminFormElement::text('link', 'Ссылка на тариф')->setValidationRules(['name' => 'required|string|min:2|max:190']),
			AdminFormElement::text('price', 'Цена')->setValidationRules(['name' => 'required|numeric']),
			AdminFormElement::multiselect('regions', 'Регионы')
				->setModelForOptions('App\Region')
				->setDisplay('name_region'),
			AdminFormElement::checkbox('active', 'Активность')
		);

		return $form;
	});

})
	->addMenuPage(Statistic::class, 350)
	->setIcon('fa fa-line-chart');

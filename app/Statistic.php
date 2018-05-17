<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	public function firstTariff()
	{
		return $this->belongsTo(Tariff::class, 'tariff1', 'id');
	}

	public function secondTariff()
	{
		return $this->belongsTo(Tariff::class, 'tariff2', 'id');
	}

	public function firstOperator()
	{
		return $this->belongsTo(Tariff::class, 'operator1', 'id');
	}

	public function secondOperator()
	{
		return $this->belongsTo(Tariff::class, 'operator2', 'id');
	}
}

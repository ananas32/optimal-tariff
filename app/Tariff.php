<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tariff extends Eloquent
{
	public function regions()
	{
		return $this->belongsToMany(Region::class, 'tariff_region', 'tariff_id', 'region_id');
	}

	public function setRegionsAttribute($regions)
	{
		$this->regions()->detach();
		if (!$regions) return;
		if (!$this->exists) $this->save();
		$this->regions()->attach($regions);
	}

	public function getRegionsAttribute($regions)
	{
		return array_pluck($this->regions()->get(['id'])->toArray(), 'id');
	}

	public function listRegions()
	{
		return $this->regions();
	}

	public function tariffNames()
	{
		return $this->belongsTo(TariffName::class, 'tariff_name_id', 'id');
	}

	public function otherCalls()
	{
		return $this->belongsTo(Call::class, 'other_call_id', 'id');
	}

	public function networkCalls()
	{
		return $this->belongsTo(Call::class, 'network_call_id', 'id');
	}

	public function internetPackages()
	{
		return $this->belongsTo(InternetPackage::class, 'internet_package_id', 'id');
	}

	public function messages()
	{
		return $this->belongsTo(Message::class, 'message_id', 'id');
	}

	public function operators()
	{
		return $this->belongsTo(Operator::class, 'operator_id', 'id');
	}

	public function regularPayments()
	{
		return $this->belongsTo(RegularPayment::class, 'regular_payment_id', 'id');
	}

	public function tariffs()
	{
		return $this->join('operators', 'operators.id', '=', 'tariffs.operator_id')
			->where('active', '=', 1);
	}

	public function getOperatorTariff($operator)
	{
		return $this->tariffs()->where('operators.operator_name', '=', $operator)->get();
	}

	public function getTariffs()
	{
		return $this->tariffs()->get();
	}

	public function getTariff($id)
	{
		return $this->tariffs()->where('tariffs.id', $id)->firstOrFail();
	}
}

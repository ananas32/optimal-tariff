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

	public function internetPackages()
	{
		return $this->belongsTo(InternetPackage::class, 'internet_package_id', 'id');
	}

	public function operators()
	{
		return $this->belongsTo(Operator::class, 'operator_id', 'id');
	}
}

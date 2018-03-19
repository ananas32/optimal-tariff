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

}

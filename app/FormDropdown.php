<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormDropdown extends Model
{
    public $timestamps = false;

	public function fromDropdown()
	{
		return $this->belongsTo(DropdownText::class, 'dropdown_text_id', 'id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    public function getSliderImage()
    {
        return Slider::select('image')
            ->where('visible', 1)
            ->orderBy('order', 'ASC')
            ->get();
    }
}

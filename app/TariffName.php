<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class TariffName extends Eloquent
{
    use Translatable;

    public $translationModel = '\App\TariffNameTranslation';
    public $translatedAttributes = ['tariff_name'];

}

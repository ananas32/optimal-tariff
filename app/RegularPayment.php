<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class RegularPayment extends Eloquent
{
    use Translatable;

    public $translationModel = '\App\RegularPaymentTranslation';
    public $translatedAttributes = ['name_payment'];

}

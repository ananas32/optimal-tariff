<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable;

    public $translationModel = '\App\PageTranslation';
    public $translatedAttributes = ['title', 'body', 'meta_title', 'meta_keywords', 'meta_description'];
    protected $with = ['translations'];

}

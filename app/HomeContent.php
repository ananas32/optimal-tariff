<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class HomeContent extends Eloquent
{
    use Translatable;

    public $translationModel = '\App\HomeContentTranslation';
    public $translatedAttributes = ['title', 'content'];
    public $table = 'home_content';

    public function getBlockContent()
    {
        return HomeContent::join('home_content_translations', 'home_content_translations.home_content_id', '=', 'home_content.id')
            ->where('home_content_translations.locale', app()->getLocale())
            ->select(
                'home_content_translations.title as b_title',
                'home_content_translations.content as b_content'
            )->take(3)
            ->orderBy('home_content.id', 'ASC')
            ->get();
    }
}

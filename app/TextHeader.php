<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class TextHeader extends Eloquent
{
    use Translatable;

    public $translationModel = '\App\TextHeaderTranslation';
    public $translatedAttributes = ['initials', 'random_text'];
    public $table = 'text_header';

    public function getHeaderText()
    {
        $countRow = TextHeader::join('text_header_translations', 'text_header_translations.text_header_id', '=', 'text_header.id')
            ->where('text_header_translations.locale', app()->getLocale())
            ->where('text_header.visible', true)
            ->count();

        $randomRow = rand(1, $countRow);

        return TextHeader::join('text_header_translations', 'text_header_translations.text_header_id', '=', 'text_header.id')
            ->where('text_header_translations.locale', app()->getLocale())
            ->where('text_header.id', $randomRow)
            ->select(
                'text_header_translations.initials as h_initials',
                'text_header_translations.random_text as h_random_text'
            )->get();

    }

}
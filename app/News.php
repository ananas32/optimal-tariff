<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent
{
    use Translatable;

    public $translationModel = '\App\NewsTranslation';
    public $translatedAttributes = ['title_news', 'short_news', 'full_news'];
    public $table = 'news';

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value, '-');
    }

    public function getBlockContent($typeNews)
    {
        return News::where('news.type_news_id', $typeNews)
            ->where('news.visible', true)->orderBy('news.id', 'DESC')
            ->first();
    }

    public function listNews()
    {
        return News::join('news_translations', 'news_translations.news_id', '=', 'news.id')
            ->where('news_translations.locale', app()->getLocale())
            ->where('news.visible', true)
            ->select(
                'news.slug',
                'news.number_of_views',
                'news.image',
                'news.created_at',
                'news_translations.title_news as title',
                'news_translations.short_news as news',
                'news_translations.full_news as full'
            );
    }

    public function getListNews()
    {
        return $this->listNews()->orderBy('news.id', 'DESC')
            ->paginate(2);
    }

    public function getNewsById($id)
    {
        return $this->listNews()->where('news.id', "$id")->get();
    }

    public function setIncrementNewsViews($id)
    {
        return News::where('id', $id)->increment('number_of_views', 1);
    }

    public function getIdNews($slug)
    {
        return News::where('slug', "$slug")->value('id');
    }
}

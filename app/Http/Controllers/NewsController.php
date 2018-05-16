<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $data = [
            'listNews' => $news->getListNews(),
            'page' => Page::where('slug', 'news')->firstOrFail()
        ];
        return view('pages.news', $data);
    }

    public function oneNews($slug, News $news)
    {
        $id = $news->getIdNews($slug);
        $news->setIncrementNewsViews($id);

        $data = [
            'fullNews' => $news->getNewsById($id),
        ];

        return view('pages.news-slug', $data);
    }

    public function filterNews()
    {
        $data = [];

        return view('pages.news', $data);
    }
}


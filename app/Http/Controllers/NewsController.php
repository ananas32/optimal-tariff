<?php

namespace App\Http\Controllers;

use App\News;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $data = [
            'listNews' => $news->getListNews(),
        ];
//        dd($news->getListNews());
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


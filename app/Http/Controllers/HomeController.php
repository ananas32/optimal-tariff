<?php

namespace App\Http\Controllers;

use App\Slider;
use App\GuestBook;
use App\HomeContent;
use App\News;
use App\Tariff;
use App\Page;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news, GuestBook $guestBook, Slider $slider, HomeContent $homeContent)
    {
        $sliderImageList = $slider->getSliderImage();

        $data = [
            'countMessage' => $guestBook->getCountGuestBookMessage(),
            'sliderImageList' => $sliderImageList,
            'blockContent' => $homeContent->getBlockContent(),
            'siteNews' => $news->getBlockContent(1),
            'operatorNews' => $news->getBlockContent(2),
            'countTariff' => Tariff::where('active', 1)->count(),
            'page' => Page::where('slug', 'home')->firstOrFail()
        ];

        return view('pages.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Slider;
use App\GuestBook;
use App\HomeContent;
use App\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(.'auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news, GuestBook $guestBook, Slider $slider, HomeContent $homeContent)
    {
        $sliderImageList = $slider->getSliderImage();
//        dd($textHeader->getHeaderText());
        $data = [
            'countMessage' => $guestBook->getCountGuestBookMessage(),

            'sliderImageList' => $sliderImageList,
            'blockContent' => $homeContent->getBlockContent(),
            'siteNews' => $news->getBlockContent(1),
            'operatorNews' => $news->getBlockContent(2)
        ];

        return view('pages.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Slider;
use App\GuestBook;
use App\TextHeader;
use App\HomeContent;

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
    public function index(TextHeader $textHeader, GuestBook $guestBook, Slider $slider, HomeContent $homeContent)
    {
        $sliderImageList = $slider->getSliderImage();
//        dd($textHeader->getHeaderText());
        $data = [
            'countMessage' => $guestBook->getCountGuestBookMessage(),
            'headerText' => $textHeader->getHeaderText(),
            'sliderImageList' => $sliderImageList,
            'blockContent' => $homeContent->getBlockContent()
        ];

        return view('pages.index', $data);
    }
}

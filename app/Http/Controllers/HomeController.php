<?php

namespace App\Http\Controllers;

use App\Slider;
use App\GuestBook;
use App\HomeContent;
use App\News;

use App\Tariff;
use App\Http\Controllers\Traits\Calculate;


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
            'operatorNews' => $news->getBlockContent(2)
        ];

        return view('pages.index', $data);
    }

    public function test()
    {
        $tariff = Tariff::find(3);
        $calculate = new Calculate;
        // Звонки в сети
        $networkCall = $calculate->calls($tariff->networkCalls, 51);
        $internetPackages = $calculate->package($tariff->internetPackages, 121);
        $messages = $calculate->message($tariff->messages, 3333);
        $regularPayments = $calculate->tariffPayment($tariff, 35);

        dd($regularPayments);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

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
    public function index(Slider $slider)
    {
        $sliderImageList = $slider->getSliderImage();

        $data = [
            'sliderImageList' => $sliderImageList
        ];

        return view('pages.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Statistic;
use Illuminate\Http\Request;
use AdminSection;

class ChartController extends Controller
{
    public function index()
	{
		$data = [
			'statistic' => Statistic::get()
		];

		return AdminSection::view(view('admin.chart', $data), 'Chart');
	}
}

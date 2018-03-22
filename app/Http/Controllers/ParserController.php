<?php

namespace App\Http\Controllers;

use App\Tariff;
use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use AdminSection;

class ParserController extends Controller
{
	public function kyivstar()
	{
		$operator = 'https://kyivstar.ua';
		$operatorTariff = 'https://kyivstar.ua/mm/tariffs';
		
		// Тарифи которые есть
		$dbTariffs = Tariff::where('operator_id', 1)->get();
		$dbTariffsLinks = [];
		$siteTariffsLinks = [];
		
		foreach($dbTariffs as $tariff){
			$dbTariffsLinks[] = $tariff->link;
		}

		$html = HtmlDomParser::file_get_html($operatorTariff);
		
		// Ссылки всех новых тарифов
		$links = $html->find('.gsm-tariffs-gallery a.gsm-tariff__head');

		foreach ($links as $link) {
			$siteTariffsLinks[] = $operator.$link->href;
		}

		$result = array_diff($siteTariffsLinks, $dbTariffsLinks);

		$data = [
			'listLinks' => $result, 
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Киевстар парсер');
	}

	public function lifecell()
	{
		$dbTariffs = Tariff::where('operator_id', 2)->get();

		$data = [
			'listLinks' => [],
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Lifecell парсер');
	}

	public function vodafone()
	{
		$dbTariffs = Tariff::where('operator_id', 3)->get();

		$data = [
			'listLinks' => [],
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Vodafone парсер');
	}

}

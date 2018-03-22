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
		$operator = 'https://www.lifecell.ua';
		$operatorTariff = 'https://www.lifecell.ua/ru/mobilnaya-svyaz/tarify/';

		// Тарифи которые есть
		$dbTariffs = Tariff::where('operator_id', 2)->get();
		$dbTariffsLinks = [];

		foreach($dbTariffs as $tariff){
			$dbTariffsLinks[] = $tariff->link;
		}

		$html = HtmlDomParser::file_get_html($operatorTariff);

		// Ссылки всех новых тарифов
		$links = $html->find('.js-batch-container a');
        $arrayLinks = [];
		foreach ($links as $link) {
            if(stristr($link->href, 'ustrojstva') === FALSE) {
                $arrayLinks[] = $operator.$link->href;
            }
		}

        $siteTariffsLinks = array_unique($arrayLinks);

		$result = array_diff($siteTariffsLinks, $dbTariffsLinks);

		$data = [
			'listLinks' => $result,
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Lifecell парсер');
	}

	public function vodafone()
	{
        $operator = 'https://new.vodafone.ua';
        $operatorTariff = 'https://new.vodafone.ua/ru/privatnim-klientam/rates/';

        // Тарифи которые есть
		$dbTariffs = Tariff::where('operator_id', 3)->get();

        $dbTariffsLinks = [];
        $siteTariffsLinks = [];

        foreach($dbTariffs as $tariff){
            $dbTariffsLinks[] = $tariff->link;
        }

        $html = HtmlDomParser::file_get_html('https://new.vodafone.ua');
        dd($html);
        die;
        // Ссылки всех новых тарифов
        $links = $html->find('title');
        dd($links);
        foreach ($links as $link) {
            $siteTariffsLinks[] = $operator.$link->href;
        }

        $result = array_diff($siteTariffsLinks, $dbTariffsLinks);


        $data = [
			'listLinks' => [],
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Vodafone парсер');
	}

}

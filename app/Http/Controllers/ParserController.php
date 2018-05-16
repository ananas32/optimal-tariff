<?php

namespace App\Http\Controllers;

use App\Tariff;
use App\Http\Controllers\Traits\Snoopy;
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

		$html = HtmlDomParser::file_get_html($operatorTariff, TRUE, NULL, 0, 999999999999);
		
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

		$html = HtmlDomParser::file_get_html($operatorTariff, TRUE, NULL, 0, 999999999999);

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

		$referer = "new.vodafone.ua/ru/privatnim-klientam/rates/";//http://www.neizvestniy-geniy.ru/
		$rawheaders = "new.vodafone.ua";

		$snoopy = new Snoopy();
		# Извлечение содержимого веб-страницы
		$snoopy->fetch($operator);
		$snoopyContent = $snoopy->results;
//		echo $snoopyContent;
		@$snoopy->agent = "Mozilla/5.0 (Windows; U; Windows NT 6.1; uk; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 Some plugins";
		$snoopy->referer = $referer;

		# Если сервер проверяет Host
		$snoopy->rawheaders["Host"] = $rawheaders;

		# Максимальное количество редиректов
		$snoopy->maxredirs = 3;

        $html = HtmlDomParser::file_get_html('http://new.vodafone.ua', TRUE, NULL, 0, 999999999999);

        // Ссылки всех новых тарифов
//        $links = $html->find('title');

//        foreach ($links as $link) {
//            $siteTariffsLinks[] = $operator.$link->href;
//        }
//
//        $result = array_diff($siteTariffsLinks, $dbTariffsLinks);


        $data = [
			'tarifLink' => 'https://new.vodafone.ua/ru/privatnim-klientam/rates/',
			'listLinks' => [],
			'tariffs' => $dbTariffs
		];

		return AdminSection::view(view('admin.parser', $data), 'Vodafone парсер');
	}

}

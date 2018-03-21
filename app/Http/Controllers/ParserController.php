<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Parser\Snoopy;

class ParserController extends Controller
{
	public function index()
	{
		$link = 'https://kyivstar.ua/ru/mm';
		$referer = "www.kyivstar.ua/ru/mm";
		$rawheaders = "kyivstar.ua/ru/mm";//www.neizvestniy-geniy.ru
		$fetchlinks = "www.kyivstar.ua/ru/mm";//http://www.neizvestniy-geniy.ru/cat/all/

		$snoopy = new Snoopy();
		# Извлечение содержимого веб-страницы
		$snoopy->fetch($link);
		$snoopyContent = $snoopy->results;

		@$snoopy->agent = "Mozilla/5.0 (Windows; U; Windows NT 6.1; uk; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 Some plugins";
		$snoopy->referer = $referer;

		# Если сервер проверяет Host
		$snoopy->rawheaders["Host"] = $rawheaders;

		# Максимальное количество редиректов
		$snoopy->maxredirs = 3;

		# Извлечение ссылок со страницы
//		$snoopy->fetchlinks($link);
//		$links = $snoopy->results;

 		echo $snoopyContent;


		# Принимаем перекодированый контент в phpQuery для парсинга
		$document = phpQuery::newDocumentHTML($snoopyContent);
		echo $snoopyContent;
	}
}

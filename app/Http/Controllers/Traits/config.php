<?
# подключаем phpQuery библиотеку
include_once 'phpQuery/phpQuery.class.php';

# подключаем «Snoopy»
include_once 'Snoopy_2/Snoopy.class.php';

# text file links
$file_name = "link_file.txt";



$referer = "www.amalgama-lab.com/songs";//http://www.neizvestniy-geniy.ru/
$rawheaders = "amalgama-lab.com";//www.neizvestniy-geniy.ru
$fetchlinks = "www.amalgama-lab.com/songs";//http://www.neizvestniy-geniy.ru/cat/all/

//$referer = "https://opttarif.esy.es";//http://www.neizvestniy-geniy.ru/
//$rawheaders = "opttarif.esy.es";//www.neizvestniy-geniy.ru
//$fetchlinks = "https://opttarif.esy.es";//http://www.neizvestniy-geniy.ru/cat/all/

function full_trim($str)                             
{                                                    
    return trim(preg_replace('/\s{2,}/', ' ', $str));                                                      
}

//Если строка содержится в другой строке и вам нужно найти ее, то задача решается просто
function contains($str, $content, $ignorecase = true)
{
    if ($ignorecase)
    {
        $str = strtolower($str);
        $content = strtolower($content);
    }

	if(strripos($content, $str) === false)
		return FALSE; //строка не найдена
	else
		return TRUE; //Строка найдена
}

# Поиск тегов в строке, возвращает масив с текстом между тегами
function get_tag($tag, $html) {

	preg_match_all('#<'.$tag.'>(.+?)</'.$tag.'>#is', $html, $arr);
   	
   	foreach ($arr as $key => $value)
   	{
   		if (empty($value))
   		{
   			unset($arr[$key]);
   		}
   	}

   	if (!empty($arr))
   	{      
  		$result = array();
  		// Извращение над масивами
  		array_walk_recursive($arr, function($value, $key) use (&$result){
  		    $result[$key] = $value; // тут возвращаете как вам хочется
  		});
  		unset($arr);

   		foreach ($result as $key => $value)
   		{
   			$result[$key] = trim(strip_tags($value));
   		}
      // echo "<pre>";
      // print_r($result);
      // echo "</pre>";
   		return $result;
   	}
   	return false;
}

function clearArr($arr)
{
    foreach ($arr as $key => $value)
    {
    	$searchTag = get_tag("li", $value);

    	if (is_array($searchTag))
    	{
    		$arr[$key] = $searchTag;
    		continue;
    	}

      $arr[$key] = trim(strip_tags($value));

      if (empty($arr[$key]))
      {
          unset($arr[$key]);
          continue;
      }
      else
      {
          $arr[$key] = full_trim($arr[$key]);
      }
    }
    return $arr;
}

# Функция розделяет количество от цени
function countAndPrice($str)
{
    $arrRes = array();
    $tmpArr = explode(" ", $str);
    foreach ($tmpArr as $key => $value) {
        $tmp = (double)$value;

        if (!empty($tmp))
            $arrRes[] = (double)$value;
    }
    return $arrRes;
}
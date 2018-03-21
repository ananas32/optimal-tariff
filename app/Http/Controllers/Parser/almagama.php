<?php

include_once 'db/config.db.php';
include_once 'config.php';


$t = 10 + rand(1,10) ;
$takt = $_GET['takt'] ;
$taktnext = $takt + 1;

$f = fopen($file_name, "a+");

$file = file($file_name);
$surse = $file[$takt];

$e = count($file);
if ($takt > $e) {
    print 'Упражнение закончил';
    exit;
}

$surse = preg_replace('/\n/', '', $surse);
$surse = preg_replace('/\s/', '', $surse);

$surse = trim($surse);

# echo url
// echo $surse;

$snoopy = new Snoopy();
# Извлечение содержимого веб-страницы
$snoopy->fetch($surse);
$snoopyContent = $snoopy->results;

@$snoopy->agent = "Mozilla/5.0 (Windows; U; Windows NT 6.1; uk; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 Some plugins";
$snoopy->referer = $referer;

# Если сервер проверяет Host
$snoopy->rawheaders["Host"] = $rawheaders;

# Максимальное количество редиректов
$snoopy->maxredirs = 3;

# Извлечение ссылок со страницы
$snoopy->fetchlinks($surse);
$links = $snoopy->results;

// echo $snoopyContent;


# Принимаем перекодированый контент в phpQuery для парсинга 
$document = phpQuery::newDocumentHTML($snoopyContent);
echo $snoopyContent;
# Здесь находится title
$title = $document->find('title')->text();
$title = explode("|", $title);

$name_tariff = clearStr($title[0]);
unset($title);

$tariff_price = $document->find('span.tariff-price')->text();

$tmp_table = $document->find('table.b-features');
$tmp_table_2 = $document->find('div.b-content table:eq(0)');

$section = $document->find("section");
$table_adaptive = $document->find('table.data:eq(1)');
$table_adaptive = explode("</td>", $table_adaptive);
$table_adaptive = clearArr($table_adaptive);
//print_r($table_adaptive);
$tmp_table = $tmp_table_2.$tmp_table;
//echo $tmp_table;


$tmp_table = explode("</td>", $tmp_table);

// $arr_table = $tmp_table;
$arr_table = clearArr($tmp_table);
unset($tmp_table);

$arrString = array(
    "infinity" => "безлім",
    "money_min" => "грн/хв",
    "sms_for_money" => "SMS за",
    "mbyte_for_money" => "МБ за",
    "money" => "грн",
    "mbyte_in_tariff" => "МБ",
    "minutes" => "хвилин",
    "minutes_month" => "хв/міс",
    "packet_price" => "пакетів",
    "minutes_month_contract" => "хв на місяць",
    "sms_mount_tariff" => "SMS на місяць",
    "call_costs_over" => "Вартість дзвінків понад",
    "sms_after_use_tariff_sms" => "Якщо ви використали всі тарифні SMS",
    "mb_after_use_tariff_mb" => "Якщо ви використали всі мегабайти з вашого тарифу",
);

$pos_calls_after_use_min = 0;
$pos_calls_after_use_min = strripos((string)$section, $arrString['call_costs_over']);

if($pos_calls_after_use_min != 0)
{
    $pos2 = 150;
    $tmpCallsAfter = substr((string)$section, $pos_calls_after_use_min, $pos2);
    $tmpCallsAfter = explode(" ", $tmpCallsAfter);
    foreach($tmpCallsAfter as $key_arr => $val_arr)
    {
        if(contains((string)$arrString['money_min'], (string)$val_arr, FALSE))
            $calls_to_other_networks_after_use_min = (double)str_replace(',', '.', $tmpCallsAfter[$key_arr-1]);
    }
}

$pos_sms_after_use_tariff_sms = 0;
$pos_sms_after_use_tariff_sms = strripos((string)$section, $arrString['sms_after_use_tariff_sms']);

if($pos_sms_after_use_tariff_sms != 0)
{
    $pos2 = 250;
    $tmpSMSAfter = substr((string)$section, $pos_sms_after_use_tariff_sms, $pos2);

    $tmpSMSAfter = explode(" ", $tmpSMSAfter);
    foreach($tmpSMSAfter as $key_arr => $val_arr)
    {
        if(contains((string)$arrString['money'], (string)$val_arr, FALSE))
            $sms_after_use_tariff_sms = (double)str_replace(',', '.', $tmpSMSAfter[$key_arr-1]);
    }
}

$pos_mb_after_use_tariff_mb = 0;
$pos_mb_after_use_tariff_mb = strripos((string)$section, $arrString['mb_after_use_tariff_mb']);

if($pos_mb_after_use_tariff_mb != 0)
{
    $pos2 = 500;
    $tmpMBAfter = substr((string)$section, $pos_mb_after_use_tariff_mb, $pos2);

    $tmpMBAfter = explode(" ", $tmpMBAfter);
//    print_r($tmpMBAfter);
    foreach($tmpMBAfter as $key_arr => $val_arr)
    {
        if(contains((string)$arrString['mbyte_in_tariff'], (string)$val_arr, FALSE))
            $mb_after_use_tariff_mb_count = (int)$tmpMBAfter[$key_arr-1];

        if(contains((string)$arrString['money'], (string)$val_arr, FALSE))
            $mb_after_use_tariff_mb_count_money = (int)$tmpMBAfter[$key_arr-1];
    }
}

$array_data = array(
    "calls_in_network" => "Дзвінки в мережі Київстар",
    "calls_to_other_mobile_and_city_number" => "Дзвінки на інші мобільні та міські номери",
    "calls_to_other_mobile" => "Дзвінки на інші мобільні",
//    "calls_to_other_mobile" => "Дзвінки на інші мобільні",
    "calls_to_other_networks" => "Дзвінки на інші мережі",
    "calls_to_city_numbers" => "Дзвінки на міські номери",
    "sms_message_to_ukrainian_numbers" => "SMS-повідомлення на українські номери",
    "sms_to_ukrainian_numbers" => "SMS на українські номери",
    "mms_messages_to_the_numbers_of_ukrainian" => "MMS-повідомлення на українські номери",
    "mb_super_fast_internet" => "Супершвидкий інтернет",
    "mb_super_fast_internet_2" => "Інтернет супершвидкий 3G",
    "social_unrestricted" => "Cоцмережi без обмежень",
    "free_music" => "Вiльна музика",
    "video_on_the_go" => "Вiдео на ходу",
    // "game_pokemon" => "Гра в покемонів",
    "knowledge_without_borders" => "Знання без меж",
);

$array_data_contract = array(
    "calls_to_other_mobile" => $array_data["calls_to_other_mobile"],
    "calls_to_city_numbers" => $array_data["calls_to_city_numbers"],
    "mb_super_fast_internet" => "Мобільний інтернет",

);

foreach ($array_data as $key_data => $value_data)
{
    foreach ($arr_table as $key_table => $value_table)
    {
        if (contains($value_data, (string)$value_table, FALSE))
        {
            $array_data[$key_data] = $arr_table[$key_table+1];

            # Проверяем на безлим, если ето безлим то даем 1
            $content = (string)$arrString['infinity'];
            $str = (string)$array_data[$key_data];

            if(contains($content, $str, FALSE))
                $array_data[$key_data] = 1;

            # Проверяем на грн/хв, если есть ето цена за минуту
            if(contains((string)$arrString['money_min'], $str, FALSE)){
                $array_data[$key_data] = (double) str_replace(',', '.', $array_data[$key_data]);
            }

            # Получаем количество и цену за SMS
            if (contains((string)$arrString['sms_for_money'], $str, FALSE))
            {
                $arrResSMS = countAndPrice($str);
                $array_data["sms_messages_to_the_numbers_of_ukrainian_count"] = $arrResSMS[0];
                $array_data["sms_messages_to_the_numbers_of_ukrainian_price_count"] = $arrResSMS[1];
                $array_data["sms_message_to_ukrainian_numbers"] = 0;
            }

            # Получаем количество и цену за Internet
            if (contains((string)$arrString['mbyte_for_money'], $str, FALSE))
            {
                $arrResSMS = countAndPrice($str);
                $array_data["super_fast_internet_count"] = $arrResSMS[0];
                $array_data["super_fast_internet_price_count"] = $arrResSMS[1];
                $array_data["super_fast_internet"] = 0;
            }

            if (contains((string)$arrString['mbyte_in_tariff'], $str, FALSE))
            {
                $array_data[$key_data] = (double) $array_data[$key_data];
            }

            if (contains((string)$arrString['money'], $str, FALSE)) {
                $array_data[$key_data] = (double) str_replace(',', '.', $array_data[$key_data]);
            }

            if (contains((string)$arrString['minutes'], $str, FALSE)) {
                $array_data[$key_data] = (double) $array_data[$key_data];
            }

            if (contains((string)$arrString['minutes_month_contract'], $str, FALSE)) {
                $array_data[$key_data] = (double) $array_data[$key_data];
            }

            if (contains((string)$arrString['minutes_month'], $str, FALSE)) {
                $array_data[$key_data] = (int) $array_data[$key_data];
            }

            if (contains((string)$arrString['sms_mount_tariff'], $str, FALSE)) {
                $array_data[$key_data] = (int) $array_data[$key_data];
            }

            break;
        }
//        else
//        {
//            $array_data[$key_data] = "Совпадений не найдено";
//        }
    }
}

foreach($table_adaptive as $adaptive)
{
    if (contains((string)$array_data_contract["calls_to_other_mobile"], (string)$adaptive, FALSE))
    {
        $array_data["calls_to_other_networks_after_use_min"] = (double) str_replace(',', '.', $table_adaptive[$adaptive+1]);
    }

    if (contains((string)$array_data_contract["calls_to_city_numbers"], (string)$adaptive, FALSE))
    {
//        echo $adaptive;
        $array_data["calls_to_city_numbers"] = (double) str_replace(',', '.', $table_adaptive[$adaptive+1]);
    }

    if (contains((string)$array_data_contract["mb_super_fast_internet"], (string)$adaptive, FALSE))
    {
        $arrResMB = countAndPrice($adaptive);
        $array_data["mb_after_use_tariff_mb_count"] = $arrResMB[1];
        $array_data["mb_after_use_tariff_mb_count_money"] = $arrResMB[0];
        echo $array_data["mb_after_use_tariff_mb_count"]."<br>";
        echo $array_data["mb_after_use_tariff_mb_count_money"]."<br>";
//        print_r($arrResMB);
        $array_data["super_fast_internet"] = 0;

    }
}

if(!empty($calls_to_other_networks_after_use_min))
{
    $array_data["calls_to_other_networks_after_use_min"] = $calls_to_other_networks_after_use_min;
}

$array_data["sms_after_use_tariff_sms"] = $sms_after_use_tariff_sms;
//echo $array_data["mb_after_use_tariff_mb_count"];
//if(!empty($mb_after_use_tariff_mb_count))
//{
//    $array_data["mb_after_use_tariff_mb_count"] = $mb_after_use_tariff_mb_count;
//}
//
//if(!empty($mb_after_use_tariff_mb_count_money))
//{
//    $array_data["mb_after_use_tariff_mb_count_money"] = $mb_after_use_tariff_mb_count_money;
//}



//$sms_after_use_tariff_sms
//echo $calls_after_use_minutes;
//echo "<pre>";
//print_r($arr_table);
//echo "</pre>";
//echo "<hr>";

ksort($array_data);
echo "<pre>";
//print_r($array_data);
echo "</pre>";

//echo "Назва тарифу = ".$name_tariff."<br> Ціна за місяць = ".$tariff_price;

// echo "<pre>";
// print_r($array_data);
// echo "</pre>";

// echo $document;

# Получаем название раздела для того, чтобы опридилить нужный ли наме даный контент
// $section = $document->find('span.brand-bg-white')->text();

// $i = 0;
// while ($links_for_file[$i]) {
//     $text = $links_for_file[$i];
//     # Вибираем все с файла в переменную
//     $arrLinksFile = file_get_contents($file_name);
//     $arrLinksFile = preg_replace('/\n/', '', $arrLinksFile);
//     $arrLinksFile = preg_replace('/\s/', '', $arrLinksFile);

//     $pos = strpos($arrLinksFile, $text);

//     // результата, так как 'a' находится в нулевой позиции.
//     if ($pos === false)
//     {
//         // echo "Строка '$text' не найдена в строке<br>";
//         fwrite($f, $text."\n");
//     }
//     $i++;
// }
fclose($f);


//echo "<hr><h1>Здесь видно роботу павучка<h1><hr>";

?>

<html>

<!-- <meta http-equiv=refresh content="<?=$t?>; URL=<?=$_SERVER['PHP_SELF']?>?takt=<?=$taktnext?>"> -->

</html>
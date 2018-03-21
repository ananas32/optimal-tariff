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


<?php
/*
You need the snoopy.class.php from
http://snoopy.sourceforge.net/
*/

# подключаем «Snoopy»
include_once 'Snoopy_2/Snoopy.class.php';

$snoopy = new Snoopy;

// need an proxy?:
//$snoopy->proxy_host = "my.proxy.host";
//$snoopy->proxy_port = "8080";

// set browser and referer:
$snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
$snoopy->referer = "https://www.amalgama-lab.com/";

// set some cookies:
$snoopy->cookies["SessionID"] = '238472834723489';
$snoopy->cookies["favoriteColor"] = "blue";

// set an raw-header:
$snoopy->rawheaders["Pragma"] = "no-cache";

// set some internal variables:
$snoopy->maxredirs = 2;
$snoopy->offsiteok = false;
$snoopy->expandlinks = false;

echo $snoopyContent = $snoopy->results;
// set username and password (optional)
//$snoopy->user = "joe";
//$snoopy->pass = "bloe";

// fetch the text of the website www.google.com:
if($snoopy->fetchtext("https://www.amalgama-lab.com/")){
    // other methods: fetch, fetchform, fetchlinks, submittext and submitlinks

    // response code:
    print "response code: ".$snoopy->response_code."<br/>\n";

    // print the headers:

    print "<b>Headers:</b><br/>";
    while(list($key,$val) = each($snoopy->headers)){
        print $key.": ".$val."<br/>\n";
    }

    print "<br/>\n";

    // print the texts of the website:
    print "<pre>".htmlspecialchars($snoopy->results)."</pre>\n";

}
else {
    print "Snoopy: error while fetching document: ".$snoopy->error."\n";
}
?>
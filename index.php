<?php
require_once("autoload.inc.php");

$rss = new DOMDocument();
$rss->load('http://www.bfmtv.com/rss/societe/');
$rssF = $rss->getElementsByTagName("channel")->item(0)->getElementsByTagName("title");



$page = new Webpage("Les titres");
$page->appendCSS(<<<CSS
body{
	text-align:center;
}
CSS
);

$page->appendContent('<h2>Les nouvelles de ' .$rssF->item(1)->nodeValue . '</h2> <br>');
for($i = 2; $i < $rssF->length; $i++){

	$page->appendContent($rssF->item($i)->nodeValue . '<br> <br>');
}


echo $page->toHTML();
$rss2 = new DOMDocument();
        $rss2->load('http://www.bfmtv.com/rss/societe/');
        $flux = $rss2->getElementsByTagName("channel")->item(0)->getElementsByTagName("title");
var_dump($rss2);
?>
<?php
require_once("webpage.class.php");

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

for($i = 1; $i < $rssF->length; $i++){
	$page->appendContent($rssF->item($i)->nodeValue . '<br> <br>');
}

echo $page->toHTML();

?>
<?php 
$url=$_GET['url'];
include'gethtml.php';
 if (strpos($url, 'torrent')){$magnet1=$url;}else{
$html=gethtml($url);
preg_match('|href="magnet(.*?)"|i',$html,$magnet);
$magnet=str_replace('href="','',$magnet[0]);
$magnet=str_replace('"','',$magnet);
}
require __DIR__ . '/../webtor.php';
?>

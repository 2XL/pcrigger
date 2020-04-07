<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_web_visitant.php');  

 
function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}










if(isset($_SERVER["HTTPS"])){
$link = obrirBD();

insertNewVisitant($_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], curPageURL(), $link);

if(count(checkVisitantBlacklisted($_SERVER['REMOTE_ADDR'], $link)) > 0){
	tancarBD($link);
	header('Location: /im_watching_u');
}
tancarBD($link);


}
?>



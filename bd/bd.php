<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_pcrigger.php'); 

function obrirBD() {
   
    //LOCAL
	/*
	if(isset($bd_server)){
	$bd_server = "localhost";
    $bd_database = "events_cd"; 
    $bd_user = "root";
    $bd_pwd = "";
	}
	*/
 
	$bd_server  = "cdevents.db.9850211.hostedresource.com";
	$bd_user    = "cdevents";
	$bd_database = "cdevents";
	$bd_pwd     = "q1@W1111"; 
	
    $link = mysql_connect($bd_server, $bd_user, $bd_pwd);
    
    if ($link) {
	mysql_select_db($bd_database, $link);
	mysql_query("SET NAMES 'utf8'", $link);
    } 
    return $link;
}

function tancarBD($link) {
    mysql_close($link);
}

function selectBD($query, $link) {
    return toArray(executarQuery($query, $link));
}

function selectCountBD($query, $link) {
    $result = toArray(executarQuery($query, $link));
    return ($result[0]['count(*)'] > 0);
}

function insertBD($query, $link) {
    return executarQuery($query, $link);
}

function updateBD($query, $link) {
    return executarQuery($query, $link);
}

function deleteBD($query, $link) {
    return executarQuery($query, $link);
}

function executarQuery($query, $link) {
    $resultat = mysql_query($query, $link );
    
    if (!$resultat) {
	echo $query;
	echo "<br/>
			<b>MySQL Error: 
		  </b>";
	echo mysql_error();
	die();
    } else {
	return $resultat;
    }
}

function toArray($resultat) {
    $registres = array();
    
    if (mysql_num_rows($resultat) > 0) {
	while ($fila = mysql_fetch_assoc($resultat)) {
	    $registres[] = $fila;
	}
    }
    
    return $registres;
}
?>

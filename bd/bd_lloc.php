<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */

function getFullLocation($link) {
	return selectBD("
		select 
			* 
		from 
			lloc  
		order by 
			id_lloc 
	", $link);
}

function getLlocsVisibles($link){
		return selectBD("
		select 
			* 
		from 
			lloc  
		where 
			visible = 1
		order by 
			id_lloc 
	", $link);
}

function getVisibleLlocs($link){
		return selectBD("
		select 
			* 
		from 
			lloc  
		where 
			visible = 1
		order by 
			id_lloc 
	", $link);
}

function getLlocByName($name, $link) {
	$result = selectBD("
		select 
			* 
		from 
			lloc  
		where 
			name = '" . mysql_real_escape_string($name) . "' 
	", $link);
	return $result;
}

function getLlocByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			lloc  
		where 
			id_lloc = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

/* * * EXIST ** */



/* * * UPDATE ** */

function updateLloc($id_lloc, $id_event, $name, $latitude, $altitude, $zoom, $path_url, $visible, $link) {
	updateBD("
        update 
            lloc
        set
            id_event = '" . mysql_real_escape_string($id_event) . "',
			name = '" . mysql_real_escape_string($name) . "',
			latitude = '" . mysql_real_escape_string($latitude) . "',
			altitude = '" . mysql_real_escape_string($altitude) . "',
			zoom = '" . mysql_real_escape_string($zoom) . "',	
			path_url = '" . mysql_real_escape_string($path_url) . "', 
			visible = '" . mysql_real_escape_string($visible) . "' 
        where 
            id_lloc = '" . mysql_real_escape_string($id_lloc) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewLloc($id_event, $name, $latitude, $altitude, $zoom, $path_url, $visible, $link) {
	insertBD("
		insert 
		into 
			lloc 
		(
			id_event, 
			name, 
			latitude,
			altitude,
			zoom,
			path_url,
			visible
			)
        values	
		(
			'" . mysql_real_escape_string($id_event) . "',
			'" . mysql_real_escape_string($name) . "', 
			'" . mysql_real_escape_string($latitude) . "',
			'" . mysql_real_escape_string($altitude) . "',
			'" . mysql_real_escape_string($zoom) . "',
			'" . mysql_real_escape_string($path_url) . "',
			'" . mysql_real_escape_string($visible) . "' 
				
			)", $link);
	return mysql_insert_id($link);
}

?> 
<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */

function getActualHome($link) {
	$result = $result = selectBD("
		select 
			* 
		from 
			home  
		where 
			visible = 1
		order by 
			id_home desc
		limit 1
	", $link);
	return $result;
}

function getFullHome($link) {
	return $result = selectBD("
		select 
			* 
		from 
			home  
		order by 
			id_home 
	", $link);
}

function getHomeByTitol($titol, $link) {
	$result = selectBD("
		select 
			* 
		from 
			home  
		where 
			titol = '" . mysql_real_escape_string($titol) . "' 
	", $link);
	return $result;
}

function getHomeByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			home  
		where 
			id_home = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

function getHomesForSelect($link) {
	return $result = selectBD("
		select 
			 id_home, titol
		from 
			home  
		where 
			visible = 1
	", $link);
}

function getFullHomesForSelect($link) {
	return $result = selectBD("
		select 
			 id_home, titol
		from 
			home   
	", $link);
}

/* * * EXIST ** */



/* * * UPDATE ** */

function updateHome($id_home, $titol, $description, $id_video, $id_foto, $id_album, $data_home, $data_active, $data_disible, $visible, $link) {
	updateBD("
        update 
            home 
        set
            titol = '" . mysql_real_escape_string($titol) . "',
			description = '" . mysql_real_escape_string($description) . "',
			id_video = '" . mysql_real_escape_string($id_video) . "',
			id_foto = '" . mysql_real_escape_string($id_foto) . "',
			id_album = '" . mysql_real_escape_string($id_album) . "',
			data_home = '" . mysql_real_escape_string($data_home) . "',
			data_active = '" . mysql_real_escape_string($data_active) . "',
			data_disible = '" . mysql_real_escape_string($data_disible) . "',
			visible = '" . mysql_real_escape_string($visible) . "'  
        where 
            id_home = '" . mysql_real_escape_string($id_home) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewHome($titol, $description, $id_video, $id_foto, $id_album, $data_home, $data_active, $data_disible, $visible, $link) {
	insertBD("
		insert 
		into 
			home 
		(
			titol, 
			description, 
			id_video, 
			id_foto,
			id_album,
			data_home,
			data_active,
			data_disible,
			visible 
			)
        values	
		(
			'" . mysql_real_escape_string($titol) . "',
			'" . mysql_real_escape_string($description) . "', 
			'" . mysql_real_escape_string($id_video) . "',
			'" . mysql_real_escape_string($id_foto) . "',
			'" . mysql_real_escape_string($id_album) . "',
			'" . mysql_real_escape_string($data_home) . "',
			'" . mysql_real_escape_string($data_active) . "',
			'" . mysql_real_escape_string($data_disible) . "',
			'" . mysql_real_escape_string($visible) . "'
			)", $link);
	return mysql_insert_id($link);
}

?> 
<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */

// agafar el usuari amb el identificador de contactar disponible i max prioritat
function getFullAlbums($link) {
	$result = selectBD("
	select * from album
	", $link);
	return $result;
}

function getAllAlbums($link) {
	$result = selectBD("
	select * from album
	", $link);
	return $result;
}

function getAlbumByName($name, $link) {
	$result = selectBD("
		select 
			* 
		from 
			album  
		where 
			name = '" . mysql_real_escape_string($name) . "' 
	", $link);
	return $result;
}

function getAlbumByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			album  
		where 
			id_album = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

function getAlbumByEvent($id_event, $link) {
	return selectBD("
		select 
			* 
		from 
			album  
		where 
			id_event = '" . mysql_real_escape_string($id_event) . "' 
	", $link);
}

function getFullAlbumsForSelect($link) {
	return $result = selectBD("
		select 
			 id_album, name
		from 
			album   
	", $link);
}

/* * * FILTER ** */


/* * * EXIST ** */


/* * * UPDATE ** */

function updateAlbum($id_album, $id_event, $name, $path_url, $visible, $link) {
	updateBD("
        update 
            album
        set
            id_event = '" . mysql_real_escape_string($id_event) . "',
			name = '" . mysql_real_escape_string($name) . "',
		 	path_url = '" . mysql_real_escape_string($path_url) . "',
			visible = '" . mysql_real_escape_string($visible) . "' 
        where 
            id_album = '" . mysql_real_escape_string($id_album) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewAlbum($id_event, $name, $path_url, $visible, $link) {
	insertBD("
		insert 
		into 
			album 
		(
			id_event, 
			name, 
			path_url,
			visible
			)
        values	
		(
			'" . mysql_real_escape_string($id_event) . "', 
			'" . mysql_real_escape_string($name) . "', 
			'" . mysql_real_escape_string($path_url) . "',
			'" . mysql_real_escape_string($visible) . "' 
			)", $link);
	return mysql_insert_id($link);
}
?> 


<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */

// agafar el usuari amb el identificador de contactar disponible i max prioritat

function getFullPromos($link) {
	return selectBD("
		select 
			* 
		from 
			promo   
	", $link);
}

function getVisiblePromos($link) {
	return selectBD("
		select 
			id_promo, name
		from 
			promo 
		where 
			visible = 1 and
			current_date between data_ini_promo and data_fin_promo 
	", $link);
}

function getVisiblePromosList($link) {
	return selectBD("
		select 
			*
		from 
			promo 
		where 
			visible = 1 and
			current_date between data_ini_promo and data_fin_promo 
	", $link);
}

function getVisiblePromosID($link) {
	return selectBD("
		select 
			id_promo 
		from 
			promo 
		where 
			visible = 1 and
			current_date between data_ini_promo and data_fin_promo 
	", $link);
}
 

function getPromoByName($name, $link) {
	$result = selectBD("
		select 
			* 
		from 
			promo  
		where 
			name = '" . mysql_real_escape_string($name) . "' 
	", $link);
	return $result;
}

function getPromoByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			promo  
		where 
			id_promo = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}
 

/* * * EXIST ** */


/* * * UPDATE ** */

function updatePromo($id_promo, $id_event, $id_foto, $name, $description, $path_url, $dip, $dfp, $visible, $link) {
	updateBD("
        update 
            promo 
        set
			id_event = '" . mysql_real_escape_string($id_event) . "',
			id_foto = '" . mysql_real_escape_string($id_foto) . "', 
            name = '" . mysql_real_escape_string($name) . "',
			description = '" . mysql_real_escape_string($description) . "',
		 	path_url = '" . mysql_real_escape_string($path_url) . "',
			data_ini_promo = '" . mysql_real_escape_string($dip) . "',
			data_fin_promo = '" . mysql_real_escape_string($dfp) . "', 
			visible = '" . mysql_real_escape_string($visible) . "' 
        where 
            id_promo = '" . mysql_real_escape_string($id_promo) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewPromo($id_event, $id_foto, $name, $description, $path_url, $dip, $dfp, $visible, $link) {
	insertBD("
		insert 
		into 
			promo 
		(
			id_event, 
			id_foto, 
			
			name, 
			description,
			path_url,
			
			data_ini_promo,
			data_fin_promo, 
			visible 
			)
        values	
		(
		'" . mysql_real_escape_string($id_event) . "',
			'" . mysql_real_escape_string($id_foto) . "',
			'" . mysql_real_escape_string($name) . "',
			'" . mysql_real_escape_string($description) . "', 
			'" . mysql_real_escape_string($path_url) . "',
			'" . mysql_real_escape_string($dip) . "',
			'" . mysql_real_escape_string($dfp) . "',
			'" . mysql_real_escape_string($visible) . "'
			)", $link);
	return mysql_insert_id($link);
}

?> 
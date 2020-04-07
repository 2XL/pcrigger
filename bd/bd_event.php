<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */
 
// agafar el usuari amb el identificador de contactar disponible i max prioritat

function getFullEvents($link) {
	return selectBD("
		select 
			* 
		from 
			event  
		order by 
			data_event, id_event 
	", $link);
}


function getVisibleEventsID($link) {
	return selectBD("
		select 
			id_event 
		from 
			event 
		where 
			visible = 1 and
			current_date <= data_event
	", $link);
}

function getVisibleEventsRealizadosID($link) {
	return selectBD("
		select 
			id_event 
		from 
			event 
		where 
			visible = 1 and
			current_date >= data_event
	", $link);
}


function getVisibleEvents($link) {
	return selectBD("
		select 
			id_event, name, data_event
		from 
			event 
		where 
			visible = 1
		order by 
			data_event, id_event 
	", $link);
}

function getVisibleEventsRealizados($link) {
	return selectBD("
		select 
			id_event, name, data_event
		from 
			event 
		where 
			visible = 1 and
			TO_DAYS(data_event) <  TO_DAYS(NOW())
		order by 
			data_event, id_event 
	", $link);
}

function getVisibleEventsProximos($link) {
	return selectBD("
		select 
			id_event, name, data_event
		from 
			event 
		where 
			visible = 1 and
			TO_DAYS(data_event) >  TO_DAYS(NOW())
		order by 
			data_event, id_event 
	", $link);
}

function getEventByName($name, $link) {
	$result = selectBD("
		select 
			* 
		from 
			event  
		where 
			name = '" . mysql_real_escape_string($name) . "' 
	", $link);
	return $result;
}

function getEventByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			event  
		where 
			id_event = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

function getEventsForSelect($link) {
	return $result = selectBD("
		select 
			 id_event, name
		from 
			event  
		where 
			visible = 1
	", $link);
}

function getFullEventsForSelect($link) {
	return $result = selectBD("
		select 
			 id_event, name
		from 
			event   
	", $link);
}





/* * * EXIST ** */
 

/* * * UPDATE ** */

function updateEvent($id_event, $id_foto, $name, $description, $data_event, $dir, $dfr, $lloc, $hora, $coordinador, $preu, $places, $visible, $flyer, $link) {
	updateBD("
        update 
            event 
        set
			id_foto = '" . mysql_real_escape_string($id_foto) . "',
			
            name = '" . mysql_real_escape_string($name) . "',
			description = '" . mysql_real_escape_string($description) . "',
			data_event = '" . mysql_real_escape_string($data_event) . "',
			data_ini_reserva = '" . mysql_real_escape_string($dir) . "',
			data_fin_reserva = '" . mysql_real_escape_string($dfr) . "',
			lloc = '" . mysql_real_escape_string($lloc) . "',
			hora = '" . mysql_real_escape_string($hora) . "',
			coordinador = '" . mysql_real_escape_string($coordinador) . "',
			preu = '" . mysql_real_escape_string($preu) . "',
			places = '" . mysql_real_escape_string($places) . "',
			visible = '" . mysql_real_escape_string($visible) . "',
			flyer = '" . mysql_real_escape_string($flyer) . "'  
        where 
            id_event = '" . mysql_real_escape_string($id_event) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewEvent($id_foto, $name, $description, $data_event, $dir, $dfr, $lloc, $hora, $coordinador, $preu, $places, $visible, $flyer, $link) {
	insertBD("
		insert 
		into 
			event 
		(
			id_foto,
			
			name, 
			description, 
			data_event, 
			data_ini_reserva,
			data_fin_reserva,
			lloc,
			hora,
			coordinador,
			preu,
			places,
			visible,
			flyer
			)
        values	
		(
			'" . mysql_real_escape_string($id_foto) . "',
			'" . mysql_real_escape_string($name) . "',
			'" . mysql_real_escape_string($description) . "',
			'" . mysql_real_escape_string($data_event) . "',
			'" . mysql_real_escape_string($dir) . "',
			'" . mysql_real_escape_string($dfr) . "',
			'" . mysql_real_escape_string($lloc) . "',
			'" . mysql_real_escape_string($hora) . "',
			'" . mysql_real_escape_string($coordinador) . "',
			'" . mysql_real_escape_string($preu) . "',
			'" . mysql_real_escape_string($places) . "',
			'" . mysql_real_escape_string($visible) . "',
			'" . mysql_real_escape_string($flyer) . "'  
			)", $link);
	return mysql_insert_id($link);
} 

?> 
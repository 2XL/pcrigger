<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */
 
// agafar el usuari amb el identificador de contactar disponible i max prioritat
function getAllFotos($link) {
    $result = selectBD("
	select * from foto
	", $link);
    return $result;
    
}

 

function getFotoByName($name, $link) {
	$result = selectBD("
		select 
			* 
		from 
			foto  
		where 
			name = '" . mysql_real_escape_string($name) . "' 
	", $link);
	return $result;
}

function getFotoByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			foto  
		where 
			id_foto = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

function getFotosByEvent($id_event, $link){
 return	selectBD("
		select 
			* 
		from 
			foto  
		where 
			id_event = '" . mysql_real_escape_string($id_event) . "' 
	", $link);
}

function getFotosByHome($id_home, $link){
 return selectBD("
		select 
			* 
		from 
			foto  
		where 
			id_home = '" . mysql_real_escape_string($id_home) . "' 
	", $link);
}

/* * * FILTER ** */


function getFotosWithFilters($name, $id_event, $id_home, $order, $page, $numCupsPage, $asc_desc, $link){
    $result = selectBD("
	select *
	from 
		foto
	where
            name like '%".mysql_real_escape_string($name)."%' and
            id_event REGEXP '".mysql_real_escape_string($id_event)."' and
            id_home REGEXP '".mysql_real_escape_string($id_home)."'  
	order by ".mysql_real_escape_string($order)." ".mysql_real_escape_string($asc_desc)."
	limit ".mysql_real_escape_string($page*$numCupsPage).",".mysql_real_escape_string($numCupsPage)."
	", $link);
    
    return $result; 
}

function getFotosWithFiltersLength($name, $id_event, $id_home, $link){
    $result = selectBD("
	select count(*) as n
        from 
            foto
	where
            name like '%".mysql_real_escape_string($name)."%' and
            id_event REGEXP '".mysql_real_escape_string($id_event)."' and
            id_home REGEXP '".mysql_real_escape_string($id_home)."' 
	", $link);
    
    return $result[0]['n']; 
}

 
/* * * EXIST ** */
 

/* * * UPDATE ** */

function updateFoto($id_foto, $id_event, $id_home, $name, $description, $tags, $path_url, $link) {
	updateBD("
        update 
            foto
        set
            id_event = '" . mysql_real_escape_string($id_event) . "',
			id_home = '" . mysql_real_escape_string($id_home) . "',
			name = '" . mysql_real_escape_string($name) . "',
			description = '" . mysql_real_escape_string($description) . "',
			tags = '" . mysql_real_escape_string($tags) . "',
			path_url = '" . mysql_real_escape_string($path_url) . "'
			 
        where 
            id_foto = '" . mysql_real_escape_string($id_foto) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewFoto($id_event, $id_home, $name, $description, $tags, $path_url, $link) {
	insertBD("
		insert 
		into 
			foto 
		(
			id_event, 
			id_home, 
			name, 
			description,
			tags,
			path_url 
			)
        values	
		(
			'" . mysql_real_escape_string($id_event) . "',
			'" . mysql_real_escape_string($id_home) . "',
			'" . mysql_real_escape_string($name) . "',
			'" . mysql_real_escape_string($description) . "',
			'" . mysql_real_escape_string($tags) . "',
			'" . mysql_real_escape_string($path_url) . "' 
			)", $link);
	return mysql_insert_id($link);
} 

?> 

 
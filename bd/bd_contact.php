<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');

/* * * GET ** */

function getContact($link) {
	$result = selectBD("
		select 
			* 
		from 
			contact 
		where 
			visible = 1
		order by 
			id_contact
		limit 1
	", $link);
	return $result[0];
}

function getVisibleContacts($link) {
	$result = selectBD("
		select 
			* 
		from 
			contact 
		where 
			visible = 1
		order by 
			id_contact 
	", $link);
	return $result;
}
// agafar el usuari amb el identificador de contactar disponible i max prioritat

function getFullContact($link) {
	return $result = selectBD("
		select 
			* 
		from 
			contact  
		order by 
			id_contact 
	", $link);
}

function getContactByUsername($username, $link) {
	$result = selectBD("
		select 
			* 
		from 
			contact  
		where 
			contact_with = '" . mysql_real_escape_string($username) . "' 
	", $link);
	return $result;
}

function getContactByID($id, $link) {
	$result = selectBD("
		select 
			* 
		from 
			contact  
		where 
			id_contact = '" . mysql_real_escape_string($id) . "' 
	", $link);
	return $result[0];
}

/*
  function getAdminByUsername($username, $link) {
  $result = selectBD("
  select * from admin
  where
  username like '".mysql_real_escape_string($username)."'
  ", $link);

  return $result[0];
  }

  function getAdminById($id, $link) {
  $result = selectBD("
  select * from admin
  where
  id_admin = '".mysql_real_escape_string($id)."'
  ", $link);

  return $result[0];
  }

 */
/* * * EXIST ** */
/*
  function existsAdminPwd($username, $pwd, $link) {
  return selectCountBD("
  select count(*) from admin
  where
  username like '".mysql_real_escape_string($username)."' and
  password like '".mysql_real_escape_string($pwd)."'
  ", $link);
  }
 */


/* * * UPDATE ** */

function updateContact($id_contact, $movil, $email, $contact_with, $tags, $visible, $movil_re, $email_re, $address, $url_path, $link) {
	updateBD("
        update 
            contact 
        set
            movil = '" . mysql_real_escape_string($movil) . "',
			email = '" . mysql_real_escape_string($email) . "',
			contact_with = '" . mysql_real_escape_string($contact_with) . "',
			tags = '" . mysql_real_escape_string($tags) . "',
			visible = '" . mysql_real_escape_string($visible) . "',
			movil_re = '" . mysql_real_escape_string($movil_re) . "',
			email_re = '" . mysql_real_escape_string($email_re) . "',
			address = '" . mysql_real_escape_string($address) . "',
			url_path = '" . mysql_real_escape_string($url_path) . "'  
        where 
            id_contact = '" . mysql_real_escape_string($id_contact) . "'
            ", $link);
}

/* * * INSERT ** */

function insertNewContact($movil, $email, $contact_with, $tags, $visible, $movil_re, $email_re, $address, $url_path, $link) {
	insertBD("
		insert 
		into 
			contact 
		(
			movil, 
			email, 
			contact_with, 
			tags,
			visible,
			movil_re,
			email_re,
			address,
			url_path
			)
        values	
		(
			'" . mysql_real_escape_string($movil) . "',
			'" . mysql_real_escape_string($email) . "',
			'" . mysql_real_escape_string($contact_with) . "',
			'" . mysql_real_escape_string($tags) . "',
			'" . mysql_real_escape_string($visible) . "',
			'" . mysql_real_escape_string($movil_re) . "',
			'" . mysql_real_escape_string($email_re) . "',
			'" . mysql_real_escape_string($address) . "',
			'" . mysql_real_escape_string($url_path) . "' 
			)", $link);
	return mysql_insert_id($link);
}
?> 
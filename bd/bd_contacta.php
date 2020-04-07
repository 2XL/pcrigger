<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');



/* * * GET ** */

function getConsultaToContact($id_contact, $link){
	return selectBD("
	select 
		* 
	from 
		consulta
	where
		id_contact = '".mysql_real_escape_string($id_contact)."'
	", $link); 
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
 
/* * * INSERT ** */

function insertNewConsulta($id_contact, $email, $phone, $subject, $comment, $comment_type, $name, $link) {
	insertBD("
		insert 
		into 
			consulta 
		(
			id_contact, 
			email, 
			phone, 
			subject,
			comment,
			comment_type,
			name
			)
        values	
		(
			'" . mysql_real_escape_string($id_contact) . "',
			'" . mysql_real_escape_string($email) . "',
			'" . mysql_real_escape_string($phone) . "',
			'" . mysql_real_escape_string($subject) . "',
			'" . mysql_real_escape_string($comment) . "',
			'" . mysql_real_escape_string($comment_type) . "',
			'" . mysql_real_escape_string($name) . "' 
			)", $link);
	return mysql_insert_id($link);
}
?> 
<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_pcrigger.php'); 
require_once ($_SERVER['DOCUMENT_ROOT']. $_PATH. '/bd/bd.php'); 



/*** GET ***/

function getUser($username, $link){
 
    $result = selectBD("
	select * from admin
	where
	    username like '".mysql_real_escape_string($username)."'
	", $link);
    return $result[0];
}

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


/*** EXIST ***/

function existsAdminPwd($username, $pwd, $link) {
    return selectCountBD("
	select count(*) from admin
	where
	    username like '".mysql_real_escape_string($username)."' and 
	    password like '".mysql_real_escape_string($pwd)."'
	", $link);
}



?>

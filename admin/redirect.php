<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] .'/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .$_PATH.'/bd/bd_admin.php');

$link = obrirBD();
$access = false;
   

if (isset($_POST['login'])) { // comprovació de login i password i creació de cookie en el cas de login
	$param = 0; 
	if (isset($_POST['username']) && $_POST['username'] != "") {
		$username = $_POST['username'];
		$param++;
	} 
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$param++;
	} 
	if ($param == 2) {
		$user_existe=existsAdminPwd($username, $password, $link); 
		if ($user_existe) { 
			$_USUARIO = getAdminByUsername($username, $link); 
			setcookie("idUser", $_USUARIO['id_admin'], time() + (3600 * 8));
			setcookie("tokenUser", sha1($_USUARIO['date_creation']), time() + (3600 * 8));
			$access = true;
		}
	}
}   
			
if ((!$access)&&(!isset($_POST['login']))) { // comprovació del cookie en el cas d'entrada directe
	$param = 0;

	if (isset($_COOKIE['idUser']) && $_COOKIE['idUser'] != "") {
		$id_user = $_COOKIE['idUser'];
		$param++;
	}

	if (isset($_COOKIE['tokenUser']) && $_COOKIE['tokenUser'] != "") {
		$token = $_COOKIE['tokenUser'];
		$param++;
	}

	if ($param == 2) {
		$_USUARIO = getAdminById($id_user, $link);
		if (sha1($_USUARIO['date_creation']) == $token) {
			$access = true;
		}
		
	}
}  
			 
tancarBD($link); 

if (!$access) {
	echo 'ur gona log out!';
	require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/logout.php');
}
?>
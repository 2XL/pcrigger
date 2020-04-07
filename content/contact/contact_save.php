<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contacta.php');
?>

<?php  

if (isset($_POST['enviar_bd'])) { 

	$id_contact = isset($_POST['id_contact']) ? $_POST['id_contact'] : 0;
	$email = $_POST['email'];
	$phone = $_POST['telefono'];
	$subject = $_POST['asunto'];
	$comment = $_POST['mensaje'];
	$comment_type = $_WEBNAME;
	$name = $_POST['nombre'];
	
	$link = obrirBD();
    insertNewConsulta($id_contact, $email, $phone, $subject, $comment, $comment_type, $name, $link);
	tancarBD($link);
	
	
	
	
}
 
?> 

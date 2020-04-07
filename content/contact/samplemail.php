<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contact.php');

if(isset($_REQUEST['contact'])){
$link = obrirBD();
$contact = getContactByID($_REQUEST['contact'], $link);
tancarBD($link); 
}

$msg="Thanks For Contacting With". $contact['contact_with'];

if(isset($_REQUEST['samplemail']))
{
	$from_add = $_REQUEST['email']; 
  
	$phone = $_POST['telefono']; 
	$comment_type = $_WEBNAME;
	$name = $_POST['nombre'];
	
	$to_add = isset($contact) ? $contact['email'] : "contact@pcrigger.com"; //<-- put your yahoo/gmail email address here

	$subject = $_REQUEST['asunto'];
	$message = '
FROM: 
	'.$comment_type.'
PHONE:
	'.$phone.'
NAME:
	'.$name.'
MSG:
	'.$_REQUEST['mensaje'];
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}
	
}
?>

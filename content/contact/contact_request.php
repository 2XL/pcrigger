
<?php 

?>

<?php  
// hacer un for each hahaahahahah spam a tope!

if (isset($_POST['enviar'])) { 
	
$to = 'xl16salou@gmail.com';
$subject .= $_POST['asunto'];
$message = ' nombre: '.$_POST['nombre'].'/  telefono: '.$_POST['telefono'].'/ mensaje: '.stripcslashes($_POST['mensaje']);
$from = $_POST['email'];
$headers = "From:" . $from; 
if (mail($to,$subject,$message,$headers)) echo "Mail Sent."; else echo "Mail Fail"; 
}
 
 
 // alternative ; http://swiftmailer.org/
?> 





<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contact.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ADD
$id_contact = $_POST['id_contact'];

$movil = $_POST['movil'];
$email = $_POST['email'];

$contact_with = $_POST['contact_with'];
$tags = $_POST['tags']; // equivalente a username 
$visible = isset($_POST['visible']) ? 1 : 0;

$movil_re = $_POST['movil_re'];
$email_re = $_POST['email_re'];

$address = $_POST['address'];
$url_path = $_POST['url_path']; 

if ($id_contact == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$user = getContactByUsername($contact_with, $link);
	if (count($user) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/contact?id=0&error&msg=userAlreadyExistWithID:' . $user[0]['id_contact'] . 'andName:' . $user[0]['contact_with'];
	} else { // user not exist, lets add the user!
		$newid = insertNewContact($movil, $email, $contact_with, $tags, $visible, $movil_re, $email_re, $address, $url_path, $link);
		$dir = $_PATH . '/admin/cdevents/contact?id=0&ok&id=' . $newid;
	}
} else {
	updateContact($id_contact, $movil, $email, $contact_with, $tags, $visible, $movil_re, $email_re, $address, $url_path, $link);
	$dir = $_PATH . '/admin/cdevents/contact?id=' . $id_contact . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
?>
 
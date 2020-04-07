<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_lloc.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';
 
// ADD
$id_lloc = $_POST['id_lloc'];

$id_event = $_POST['id_event'];
$name = $_POST['name'];

$latitude = $_POST['latitude'];
$altitude = $_POST['altitude']; // equivalente a username 
 
$zoom = $_POST['zoom'];
$path_url = $_POST['path_url']; // equivalente a username 
 


$visible = isset($_POST['visible']) ? 1 : 0;


if ($id_lloc == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$lloc = getLlocByName($name, $link);
	if (count($lloc) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/location?id=0&error&msg=llocAlreadyExistWithID:' . $lloc[0]['id_lloc'] . 'andName:' . $lloc[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewLloc($id_event, $name, $latitude, $altitude, $zoom, $path_url, $visible, $link);
		$dir = $_PATH . '/admin/cdevents/location?id=0&ok&id=' . $newid;
	}
} else {
	updateLloc($id_lloc, $id_event, $name, $latitude, $altitude, $zoom, $path_url, $visible, $link);
	$dir = $_PATH . '/admin/cdevents/location?id=' . $id_lloc . '&ok';
	// editar un contacte existent
} 
tancarBD($link);
header("Location: $dir ");
echo $dir;
  

?>
 
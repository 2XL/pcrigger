<?php

$thisSection = 'album';


require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_'.$thisSection.'.php');

$link = obrirBD();
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
 */
// ADD
$id_album = $_POST['id_'.$thisSection.''];

$id_event = $_POST['id_event'];
$name = $_POST['name']; 
$path_url = $_POST['path_url']; // equivalente a username 
 


$visible = isset($_POST['visible']) ? 1 : 0;


if ($id_album == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$album = getAlbumByName($name, $link);
	if (count($album) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/'.$thisSection.'?id=0&error&msg='.$thisSection.'AlreadyExistWithID:' . $album[0]['id_'.$thisSection.''] . 'andName:' . $album[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewAlbum($id_event, $name, $path_url, $visible, $link);
		$dir = $_PATH . '/admin/cdevents/'.$thisSection.'?id=0&ok&id=' . $newid;
	}
} else {
	updateAlbum($id_album, $id_event, $name, $path_url, $visible, $link);
	$dir = $_PATH . '/admin/cdevents/'.$thisSection.'?id=' . $id_album . '&ok';
	// editar un contacte existent
} 
tancarBD($link);
header("Location: $dir ");
echo $dir;
  

?>
 
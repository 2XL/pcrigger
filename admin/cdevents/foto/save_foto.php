<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ADD
$id_foto = $_POST['id_foto'];

$id_event = $_POST['id_event'];
$id_home = $_POST['id_home'];

$name = $_POST['name'];
$description = $_POST['description'];


$tags = $_POST['tags'];
$path_url = $_POST['path_url'];


if ($id_foto == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$foto = getFotoByName($name, $link);
	if (count($foto) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/foto?id=0&error&msg=fotoAlreadyExistWithID:' . $foto[0]['id_foto'] . 'andName:' . $foto[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewFoto($id_event, $id_home, $name, $description, $tags, $path_url, $link);

		$dir = $_PATH . '/admin/cdevents/foto?id=0&ok&id=' . $newid;
	}
} else {
	updateFoto($id_foto, $id_event, $id_home, $name, $description, $tags, $path_url, $link);
	$dir = $_PATH . '/admin/cdevents/foto?id=' . $id_foto . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
?>
 
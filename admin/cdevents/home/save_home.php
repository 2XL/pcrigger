<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ADD
$id_home = $_POST['id_home'];

$titol = $_POST['titol'];
$description = $_POST['description'];

$id_video = $_POST['id_video'];
$id_foto = $_POST['id_foto']; // equivalente a username 
$id_album = $_POST['id_album'];

$data_home =    date("Y-m-d", strtotime($_POST['data_home']));
$data_active =  date("Y-m-d", strtotime($_POST['data_active']));

$data_disible = date("Y-m-d", strtotime($_POST['data_disible']));

$visible = isset($_POST['visible']) ? 1 : 0;


if ($id_home == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$home = getHomeByTitol($titol, $link);
	if (count($home) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/home?id=0&error&msg=homeAlreadyExistWithID:' . $home[0]['id_home'] . 'andTitol:' . $home[0]['titol'];
	} else { // user not exist, lets add the user!
		$newid = insertNewHome($titol, $description, $id_video, $id_foto,$id_album, $data_home, $data_active, $data_disible, $visible, $link);
		$dir = $_PATH . '/admin/cdevents/home?id=0&ok&id=' . $newid;
	}
} else {
	updateHome($id_home, $titol, $description, $id_video, $id_foto, $id_album, $data_home, $data_active, $data_disible, $visible, $link);
	$dir = $_PATH . '/admin/cdevents/home?id=' . $id_home . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
  

?>
 
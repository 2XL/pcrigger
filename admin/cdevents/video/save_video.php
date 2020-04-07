<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ADD
$id_video = $_POST['id_video'];

$id_event = $_POST['id_event'];
$id_home = $_POST['id_home'];

$name = $_POST['name'];
$description = $_POST['description'];


$tags = $_POST['tags'];
$path_url = $_POST['path_url'];


if ($id_video == 0) {
	// afegir un nou contacte
	// comprovar si el contacte existeix username no repetit
	$video = getVideoByName($name, $link);
	if (count($video) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/video?id=0&error&msg=videoAlreadyExistWithID:' . $video[0]['id_video'] . 'andName:' . $video[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewVideo($id_event, $id_home, $name, $description, $tags, $path_url, $link);

		$dir = $_PATH . '/admin/cdevents/video?id=0&ok&id=' . $newid;
	}
} else {
	updateVideo($id_video, $id_event, $id_home, $name, $description, $tags, $path_url, $link);
	$dir = $_PATH . '/admin/cdevents/video?id=' . $id_video . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
?>
 
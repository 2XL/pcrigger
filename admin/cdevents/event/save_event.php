<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';

// ADD
$id_event = $_POST['id_event'];

$name = $_POST['name'];
$description = $_POST['description'];

$data_event = date("Y-m-d", strtotime($_POST['data_event']));
$dir = date("Y-m-d", strtotime($_POST['data_ini_reserva']));
$dfr = date("Y-m-d", strtotime($_POST['data_fin_reserva']));
 
$id_foto = $_POST['id_foto'];

$lloc = $_POST['lloc']; // equivalente a username 

$hora = $_POST['hora'];
$coordinador = $_POST['coordinador'];

$preu = $_POST['preu'];
$places = $_POST['places']; 

$visible = isset($_POST['visible']) ? 1 : 0;

$flyer = $_POST['flyer'];

 
if ($id_event == 0) {
	// afegir un nou event
	// comprovar si el event existeix name no repetit
	$event = getEventByName($name, $link);
	if (count($event) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/event?id=0&error&msg=eventAlreadyExistWithID:' . $event[0]['id_event'] . 'andName:' . $event[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewEvent($id_foto, $name, $description, $data_event, $dir, $dfr, 
				$lloc, $hora, $coordinador, $preu, $places, $visible, $flyer, $link);
		$dir = $_PATH . '/admin/cdevents/event?id=0&ok&id=' . $newid;
	}
} else {
	updateEvent($id_event, $id_foto, $name, $description, $data_event, $dir, $dfr, 
			$lloc, $hora, $coordinador, $preu, $places, $visible, $flyer, $link);
	$dir = $_PATH . '/admin/cdevents/event?id=' . $id_event . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
 

?>
 
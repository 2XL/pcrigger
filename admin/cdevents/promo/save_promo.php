<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_promo.php');

$link = obrirBD();

echo '<pre>';
print_r($_POST);
echo '</pre>';
 
// ADD

$id_promo = $_POST['id_promo'];

$id_event = $_POST['id_event'];
$id_foto = $_POST['id_foto'];

$name = $_POST['name'];
$description = $_POST['description'];

$path_url = $_POST['path_url']; // equivalente a username 

$dip = date("Y-m-d", strtotime($_POST['data_ini_promo']));
$dfp = date("Y-m-d", strtotime($_POST['data_fin_promo']));
 
$visible = isset($_POST['visible']) ? 1 : 0;
 

 
if ($id_promo == 0) {
	// afegir un nou promo
	// comprovar si el promo existeix name no repetit
	$promo = getPromoByName($name, $link);
	if (count($promo) > 0) { // user already exist
		$dir = $_PATH . '/admin/cdevents/promo?id=0&error&msg=promoAlreadyExistWithID:' . $promo[0]['id_promo'] . 'andName:' . $promo[0]['name'];
	} else { // user not exist, lets add the user!
		$newid = insertNewPromo($id_event, $id_foto, $name, $description, $path_url, $dip, $dfp, $visible, $link);
		$dir = $_PATH . '/admin/cdevents/promo?id=0&ok&id=' . $newid;
	}
} else {
	updatePromo($id_promo, $id_event, $id_foto, $name, $description, $path_url, $dip, $dfp, $visible, $link);
	$dir = $_PATH . '/admin/cdevents/promo?id=' . $id_promo . '&ok';
	// editar un contacte existent
}

tancarBD($link);
header("Location: $dir ");
echo $dir;
  
?>
 
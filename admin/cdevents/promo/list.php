<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');

$section = 'promo'; 
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_'.$section.'.php'); 

?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) {
		// afegir un now contact manager
	}
} else {
	$link = obrirBD();
	$promo_list = getVisiblePromosList($link);
	tancarBD($link);
}
 
?>


<table class="table_list" >
	<caption>Promo <a class="button-blue" href="index.php?id=0">CreatePromo</a>
	</caption>
	<thead>
		<tr>
			<td>
				id_promo
			</td>
			<td>
				id_event
			</td>
			<td>
				id_foto
			</td> 
			<td>
				name
			</td>
			<td>
				data_ini_promo
			</td>
			<td>
				data_fin_promo
			</td> 
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr> 
	</thead>
	<?php foreach ($promo_list as $promo) { ?>
		<tr>
			<td>
				<?php echo $promo['id_promo']; ?>
			</td>
			<td>
				<?php echo $promo['id_event']; ?>
			</td>
			<td>
				<?php echo $promo['id_foto']; ?>
			</td> 
			<td>
				<?php echo $promo['name']; ?>
			</td> 
			<td>
				<?php echo $promo['data_ini_promo']; ?>
			</td>
			<td>
				<?php echo $promo['data_fin_promo']; ?>
			</td> 
			<td>
				<?php echo $promo['visible']; ?>
			</td> 	
			<td>
				<a href="index.php?id=<?php echo $promo['id_promo']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table>   
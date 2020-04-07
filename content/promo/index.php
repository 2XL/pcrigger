
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_promo.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');
$link = obrirBD();
?>




<?php
if (isset($_GET['promo'])) {
	$element[0] = $_GET['promo']; 
	$list = $element;
} else {
	$array = getVisiblePromosID($link);
	foreach ($array as $k => $v) {
		$new[$k] = $v['id_promo'];
	}
	$list = $new;
}


foreach ($list as $id) {
	$promo = getPromoByID($id, $link); // get promo global spec 
	$foto = getFotoByID($promo['id_foto'], $link);
	?>  

	<div class="content">
		<table class="promo"  style="width: 100%;">
			<caption style="margin-bottom: 40px;">
				<h1>
					<?php echo $promo['name']; ?>
				</h1>
			</caption>

			<tr style="float: left; margin: 0; padding: 0;" >
				<td > 
					<a  href="<?php echo $_PATH . '/event.php?event=' . $promo['id_event']; ?>">
						<img heigth="600" width ="400"src="<?php echo $_PATH . $foto['path_url']; ?>" alt="<?php echo $foto['name']; ?>"  > 
					</a> 
				</td>
				<td style="width: 100%;  vertical-align: top; padding-left: 10px;">
					<table style="width: 100%; height: 100%;" >
						<tr>
							<td style="padding-top: 10px; " >
								<?php echo $promo['description']; ?> 
							</td>
						</tr>
						<tr >
							<td style="padding-top: 10px;" >
								<?php
								$ID_EVENT = $promo['id_event'];
								require ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/content/promo/fb-share.php');
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr> 
		</table>
	</div>


<?php } ?>






<?php tancarBD($link); ?>
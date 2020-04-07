
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_promo.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');
$link = obrirBD(); 




 
	$array = getVisibleEventsID($link);
	foreach ($array as $k => $v) {
		$new[$k] = $v['id_event'];
	}
	$list = $new;
 


foreach ($list as $id) {
	$event = getEventByID($id, $link); // get promo global spec 
	$foto = getFotoByID($event['id_foto'], $link);
	?>  

	<div class="content">
		<table class="promo"  style="width: 100%;">
			<caption style="margin-bottom: 40px;">
				<h1>
					<?php echo $event['name']; ?>
				</h1>
			</caption>

			<tr style="float: left; margin: 0; padding: 0;" >
				<td > 
					<a  href="<?php echo $_PATH . '/event.php?event=' . $event['id_event']; ?>">
						<img heigth="600" width ="400"src="<?php echo $_PATH . $foto['path_url']; ?>" alt="<?php  echo $foto['name']; ?>"  > 
					</a> 
				</td>
				<td style="width: 100%;  vertical-align: top; padding-left: 10px;">
					<table style="width: 100%; height: 100%;" >
						<tr>
							<td style="padding-top: 10px; " > 
									<?php 
									$string = $event['description'];
									$string = (strlen($string) > 303) ? substr($string,0,300).'...' : $string;
									echo $string; 
									?> 
								</div> 
							</td>
						</tr>
						<tr >
							<td style="padding-top: 10px;" >
								<?php
								$ID_EVENT = $event['id_event'];
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
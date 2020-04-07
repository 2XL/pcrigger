
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
?>
<?php
$link = obrirBD();
$event = getEventByID($_GET['event'], $link); // get event global spec 
tancarBD($link);
?>

<!-- show event in a predef format display with all its atributes like vids and photos -->

<?php ?> 

<div class="content">
	<table class="event" >
		<caption style="margin-bottom: 40px;">
			<h1>
				<?php echo $event['name']; ?>
			</h1>
		</caption>

		<tr >
			<td style=" vertical-align:  top; padding-right: 10px;"> 

				DESCRIPCIÓN


			</td> 
			<td> 
				<?php echo $event['description']; ?> 
				<br>
			</td>
		</tr>  
		<tr> 
			<td  style=" vertical-align:  central;"> 

				FECHA


			</td>
			<td class="spec_event" >

				<?php echo $event['data_event']; ?>
				hora: <?php echo $event['hora']; ?>

			</td>
		</tr>  
		<tr>
			<td  style=" vertical-align:  central;">  
				RESERVA
			</td> 
			<td  class="spec_event">
				<?php echo $event['data_fin_reserva']; ?> - <?php echo $event['data_ini_reserva']; ?>
			</td>
		</tr>   
		<tr>
			<td  style=" vertical-align:  central;">  
				SITIO  
			</td> 
			<td  class="spec_event"> 
				<?php echo $event['lloc']; ?>  
			</td>
		</tr>  
		<tr>
			<td  style=" vertical-align:  central;">  
				PLAZAS 
			</td> 
			<td  class="spec_event" >

				<?php echo $event['places']; ?>

			</td>
		</tr>  
		<tr>
			<td>
				COMPARTIR
			</td>
			<td>
				<?php
				require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/content/event/fb-share.php');
				?>
			</td> 
		</tr>
	</table>
</div>

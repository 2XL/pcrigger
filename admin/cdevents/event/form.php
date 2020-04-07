<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
?>

<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un event
} else { // editar un event
	$event = getEventByID($_GET['id'], $link);
}
tancarBD($link);
?>


<script type="text/javascript" >
    function submitForm()
    {
		document.forms['event_form'].submit();
    }
</script>




<form name="event_form" method="POST" id="event_form" action="save_event.php" enctype="multipart/form-data">
    <table class="table_edit" style="display: block;">
        <caption>Event - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($event)) echo 'id' ?>
			</td>
			<td >
				<?php if (isset($event)) echo $event['id_event']; ?>
				<input type="hidden" value="<?php if (isset($event)) echo $event['id_event']; else echo 0; ?>" name="id_event" >
			</td>
		</tr>
		<tr>
			<td>
				name
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['name']; ?>" name="name" >
			</td>
		</tr>
		<tr>
			<td>
				id_foto
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['id_foto']; ?>" name="id_foto" >
			</td>
		</tr>
		<tr>       
			<td > 
				description
			</td>
			<td>
				<textarea rows="5" cols="50" id="description" name="description">
					<?php if (isset($event)) echo $event['description']; ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				data_event 
			</td>
			<td> 
				<input class="datepicker" type="text" value="<?php if (isset($event)) echo date("d-m-Y", strtotime($event['data_event'])); ?>" name="data_event" >
			</td>
		</tr> 
		<tr>
			<td>
				data_ini_reserva
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($event)) echo date("d-m-Y", strtotime($event['data_ini_reserva'])); ?>" name="data_ini_reserva" >
			</td>
		</tr>
		<tr>
			<td>
				data_fin_reserva
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($event)) echo date("d-m-Y", strtotime($event['data_fin_reserva'])); ?>" name="data_fin_reserva" >
			</td>
		</tr>
		<tr>
			<td>
				lloc
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['lloc']; ?>" name="lloc" >
			</td>
		</tr>
		<tr>
			<td>
				hora
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['hora']; ?>" name="hora" >
			</td>
		</tr>
		<tr>
			<td>
				coordinador
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['coordinador']; ?>" name="coordinador" >
			</td>
		</tr>
		<tr>
			<td>
				preu
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['preu']; ?>" name="preu" >
			</td>
		</tr>
		<tr>
			<td>
				places
			</td> 
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['places']; ?>" name="places" >
			</td> 
		</tr>
		<tr>
			<td>
				visible
			</td>
			<td>
				<input type="checkbox" <?php if (isset($event)) if ($event['visible'] == 1) echo 'checked';  ?> name="visible" >
			</td>
		</tr> 
		<tr>
			<td>
				flyer
			</td>
			<td>
				<input type="text" value="<?php if (isset($event)) echo $event['flyer']; ?>" name="flyer" >
			</td>
		</tr>
		<tr>
			<td>

			</td>
			<td align="right">
				<a class="button-blue"  href="javascript:submitForm()">update!</a>
			</td>  
		</tr>
    </table>
</form>

<script type="text/javascript">

	/* 
	var heigth_pregunta=100; 
	var heigth_texto=200;
	CKEDITOR.replace("pregunta_a", {height:heigth_pregunta});
	 */
   
	CKEDITOR.replace("description"); 
</script>

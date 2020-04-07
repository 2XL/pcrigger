<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');


$section = 'promo';
$title = 'Promo';
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_' . $section . '.php');
?>

<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un event
} else { // editar un event
	$promo = getPromoByID($_GET['id'], $link);
}

$event_options = getFullEventsForSelect($link);

tancarBD($link);
?>


<script type="text/javascript" >
    function submitForm()
    {
		document.forms['<?php echo $section; ?>_form'].submit();
    }
</script>




<form name="<?php echo $section; ?>_form" method="POST" id="<?php echo $section; ?>_form" action="save_<?php echo $section; ?>.php" enctype="multipart/form-data">
    <table class="table_edit" style="display: block;">
        <caption><?php echo $title; ?> - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($promo)) echo 'id' ?>
			</td>
			<td >
				<?php if (isset($promo)) echo $promo['id_' . $section]; ?>
				<input type="hidden" value="<?php if (isset($promo)) echo $promo['id_' . $section]; else echo 0; ?>" name="id_<?php echo $section; ?>" >
			</td>
		</tr> 

		<tr>
			<td>
				id_event
			</td> 
			<td>  
				<select name="id_event" id="id_event" >
					<?php
					foreach ($event_options as $option) {
						?>
						<option value="<?php echo $option['id_event']; ?>"><?php echo $option['id_event'] . ' - ' . $option['name']; ?></option>
					<?php } ?>
					<option value="<?php if (isset($promo)) echo $promo['id_event']; ?>" selected >select</option>
				</select> 
			</td>
		</tr>
		<tr>
			<td>
				id_foto
			</td>
			<td>
				<input type="text" value="<?php if (isset($promo)) echo $promo['id_foto']; ?>" name="id_foto" >
			</td>
		</tr>
		<tr>
			<td>
				name
			</td>
			<td>
				<input type="text" value="<?php if (isset($promo)) echo $promo['name']; ?>" name="name" >
			</td>
		</tr>


		<tr>       
			<td > 
				description
			</td>
			<td>
				<textarea rows="5" cols="50" id="description" name="description">
					<?php if (isset($promo)) echo $promo['description']; ?>
				</textarea>
			</td>
		</tr> 

		<tr>
			<td>
				path_url
			</td>
			<td>
				<input type="text" value="<?php if (isset($promo)) echo $promo['path_url']; ?>" name="path_url" >
			</td>
		</tr>


		<tr>
			<td>
				data_ini_promo
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($promo)) echo date("d-m-Y", strtotime($promo['data_ini_promo'])); ?>" name="data_ini_promo" >
			</td>
		</tr>
		<tr>
			<td>
				data_fin_promo
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($promo)) echo date("d-m-Y", strtotime($promo['data_fin_promo'])); ?>" name="data_fin_promo" >
			</td>
		</tr> 


		<tr>
			<td>
				visible
			</td>
			<td>
				<input type="checkbox" <?php if (isset($promo)) if ($promo['visible'] == 1) echo 'checked';  ?> name="visible" >
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

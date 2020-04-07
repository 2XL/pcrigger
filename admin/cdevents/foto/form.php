<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');


?>


<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un contact 
} else { // editar un contact
	$foto = getFotoByID($_GET['id'], $link);
}

$event_options = getFullEventsForSelect($link);
$home_options = getFullHomesForSelect($link);
tancarBD($link);


/*
  print_r('<pre>');
  print_r($foto);
  print_r('</pre>');
 */
?>


<script type="text/javascript" >
    function submitForm()
    {
        document.forms['foto_form'].submit();
    }    
</script>



<form name="foto_form" method="POST" id="home_form" action="save_foto.php" enctype="multipart/form-data">
    <table class="table_edit" >
        <caption>Foto - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($foto)) echo 'id' ?>
			</td>
			<td>
				<?php if (isset($foto)) echo $foto['id_foto']; ?>
				<input type="hidden" value="<?php if (isset($foto)) echo $foto['id_foto']; else echo 0; ?>" name="id_foto" >
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
					<option value="<?php if (isset($foto)) echo $foto['id_event']; ?>" selected >select</option>
				</select> 
			</td>
		</tr>
		<tr>       
			<td > 
				id_home
			</td>
			<td> 
				<select name="id_home" id="id_home" >
					<?php
					foreach ($home_options as $option) {
						?>
						<option value="<?php echo $option['id_home']; ?>"><?php echo $option['id_home'] . ' - ' . $option['titol']; ?></option>
					<?php } ?>
					<option value="<?php if (isset($foto)) echo $foto['id_home']; ?>" selected>select</option>
				</select> 
			</td>
		</tr>
		<tr>       
			<td > 
				name
			</td>
			<td>
				<input type="text" value="<?php if (isset($foto)) echo $foto['name']; ?>" name="name" >
			</td>
		</tr>
		<tr>       
			<td > 
				description
			</td> 
			<td>
				<textarea rows="5" cols="50" id="description" name="description">
					<?php if (isset($foto)) echo $foto['description']; ?>
				</textarea>
			</td>
		</tr>

		<tr>
			<td>
				tags
			</td>
			<td>
				<input type="text" value="<?php if (isset($foto)) echo $foto['tags']; ?>" name="tags" >
			</td>
		</tr>
		<tr>
			<td>
				path_url
			</td>
			<td>
				<input type="text" value="<?php if (isset($foto)) echo $foto['path_url']; ?>" name="path_url" >
			</td>
		</tr> 
		<tr>
			<td>
				foto
			</td>
			<td>
				<img   src="<?php echo $foto['path_url']; ?>" alt="<?php echo $foto['name']; ?>" /> 
			</td>
		</tr>
		<tr>
			<td>

			</td>
			<td align="right">
				<a class="button-blue"  href="javascript:submitForm()"><?php if (isset($foto)) echo 'update!'; else echo 'add!' ?></a>
			</td>  
		</tr>
    </table>
</form> 


<script type="text/javascript">  
	CKEDITOR.replace("description"); 
</script>
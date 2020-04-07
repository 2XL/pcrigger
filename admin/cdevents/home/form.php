<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_album.php');
?>

<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un contact 
} else { // editar un contact
	$home = getHomeByID($_GET['id'], $link);
}
$album_options = getFullAlbumsForSelect($link);
tancarBD($link);





/*
  print_r('<pre>');
  print_r($home);
  print_r('</pre>');
 */
?>



<script type="text/javascript" >
    function submitForm()
    {
		document.forms['home_form'].submit();
    }
</script>



<form name="home_form" method="POST" id="home_form" action="save_home.php" enctype="multipart/form-data">
    <table class="table_edit" >
        <caption>Home - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($home)) echo 'id' ?>
			</td>
			<td>
				<?php if (isset($home)) echo $home['id_home']; ?>
				<input type="hidden" value="<?php if (isset($home)) echo $home['id_home']; else echo 0; ?>" name="id_home" >
			</td>
		</tr>
		<tr>
			<td>
				titol
			</td>
			<td>
				<input type="text" value="<?php if (isset($home)) echo $home['titol']; ?>" name="titol" >
			</td>
		</tr>
		<tr>       
			<td > 
				description
			</td>
			<td>
				<textarea rows="5" cols="50" id="description" name="description">
					<?php if (isset($home)) echo $home['description']; ?>
				</textarea>
			</td>
		</tr>
 
		<tr>
			<td>
				id_video
			</td>
			<td>
				<input type="text" value="<?php if (isset($home)) echo $home['id_video']; ?>" name="id_video" >
			</td>
		</tr>
		<tr>
			<td>
				id_foto
			</td>
			<td>
				<input type="text" value="<?php if (isset($home)) echo $home['id_foto']; ?>" name="id_foto" >
			</td>
		</tr>
		<tr>
			<td>
				id_album
			</td>
			<td>  
				<select name="id_album" id="id_album" >
					<?php
					foreach ($album_options as $option) {
						?>
						<option value="<?php echo $option['id_album']; ?>"><?php echo $option['id_album'] . ' - ' . $option['name']; ?></option>
					<?php } ?>
					<option value="<?php if (isset($home)) echo $home['id_album']; ?>" selected >select</option>
				</select> 
			</td>
		</tr>
		<tr>
			<td>
				data_home
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($home)) echo date("d-m-Y", strtotime($home['data_home'])); ?>" name="data_home" >
			</td>
		</tr>
		<tr>
			<td>
				data_active
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($home)) echo date("d-m-Y", strtotime($home['data_active'])); ?>" name="data_active" >
			</td>
		</tr>
		<tr>
			<td>
				data_disible
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($home)) echo date("d-m-Y", strtotime($home['data_disible'])); ?>" name="data_disible" >

			</td>
		</tr>
		<tr>
			<td>
				visible
			</td>
			<td>
				<input type="checkbox" <?php if (isset($home)) if ($home['visible'] == 1) echo 'checked';  ?> name="visible" >
			</td>
		</tr> 
		<tr>
			<td>

			</td>
			<td align="right">
				<a class="button-blue"  href="javascript:submitForm()"><?php if (isset($home)) echo 'update!'; else echo 'add!' ?></a>
			</td>  
		</tr>
    </table>
</form> 


<script type="text/javascript"> 
   
	CKEDITOR.replace("description"); 
</script>
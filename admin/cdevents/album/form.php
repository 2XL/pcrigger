<?php

$thisSection = 'album';

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_'.$thisSection.'.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');




?>

<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un contact 
} else { // editar un contact
	$album = getAlbumByID($_GET['id'], $link);
}

$event_options = getFullEventsForSelect($link);
tancarBD($link);


/*
print_r('<pre>');
print_r($lloc);
print_r('</pre>');
*/
?>



<script type="text/javascript" >
    function submitForm()
    {
		document.forms['<?php echo $thisSection; ?>_form'].submit();
    }
</script>



<form name="<?php echo $thisSection; ?>_form" method="POST" id="<?php echo $thisSection; ?>_form" action="save_<?php echo $thisSection; ?>.php" enctype="multipart/form-data">
    <table class="table_edit" >
        <caption>Album - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($album)) echo 'id' ?>
			</td>
			<td>
				<?php if (isset($album)) echo $album['id_'.$thisSection.'']; ?>
				<input type="hidden" value="<?php if (isset($album)) echo $album['id_'.$thisSection.'']; else echo 0; ?>" name="id_<?php echo $thisSection; ?>" >
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
					<option value="<?php if (isset($album)) echo $album['id_event']; ?>" selected >select</option>
				</select> 
			</td>
		</tr>

		<tr>
			<td>
				name
			</td>
			<td>
				<input type="text" value="<?php if (isset($album)) echo $album['name']; ?>" name="name" >
			</td>
		</tr> 
		<tr>
			<td>
				path_url 
			</td>
			<td>
				<input type="text" value="<?php if (isset($album)) echo $album['path_url']; ?>" name="path_url" >
			</td>
		</tr>
		<tr>
			<td>
				visible
			</td>
			<td>
				<input type="checkbox" <?php if (isset($album)) if ($album['visible'] == 1) echo 'checked';  ?> name="visible" >
			</td>
		</tr> 
		<tr>
			<td>

			</td>
			<td align="right">
				<a class="button-blue"  href="javascript:submitForm()"><?php if (isset($album)) echo 'update!'; else echo 'add!' ?></a>
			</td>  
		</tr>
    </table>
</form> 
 
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');
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
	$video = getVideoByID($_GET['id'], $link);
}

$event_options = getFullEventsForSelect($link);
$home_options = getFullHomesForSelect($link);
tancarBD($link);


/*
print_r('<pre>');
print_r($video);
print_r('</pre>');
*/

?>


<script type="text/javascript" >
    function submitForm()
    {
        document.forms['video_form'].submit();
    }    
</script>



<form name="video_form" method="POST" id="video_form" action="save_video.php" enctype="multipart/form-data">
    <table class="table_edit" >
        <caption>Video - <?php if ($_GET['id'] == 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if (isset($video)) echo 'id' ?>
			</td>
			<td>
				<?php if (isset($video)) echo $video['id_video']; ?>
				<input type="hidden" value="<?php if (isset($video)) echo $video['id_video']; else echo 0; ?>" name="id_video" >
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
					<option value="<?php if (isset($video)) echo $video['id_event']; ?>" selected >select</option>
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
					<option value="<?php if (isset($video)) echo $video['id_home']; ?>" selected>select</option>
				</select> 
			</td>
		</tr>
		<tr>       
			<td > 
				name
			</td>
			<td>
				<input type="text" value="<?php if (isset($video)) echo $video['name']; ?>" name="name" >
			</td>
		</tr>
		<tr>       
			<td > 
				description
			</td> 
			<td>
				<textarea rows="5" cols="50" id="description" name="description">
					<?php if (isset($video)) echo $video['description']; ?>
				</textarea>
			</td>
		</tr>
	 
		<tr>
			<td>
				tags
			</td>
			<td>
				<input type="text" value="<?php if (isset($video)) echo $video['tags']; ?>" name="tags" >
			</td>
		</tr>
		<tr>
			<td>
				path_url
			</td>
			<td>
				<input type="text" value="<?php if (isset($video)) echo $video['path_url']; ?>" name="path_url" >
			</td>
		</tr> 
		<tr>
			<td>
				video
			</td>
			<td> 
				<iframe width="800" height="450" src="<?php echo $video['path_url']; ?>" frameborder="0" allowfullscreen></iframe>
			</td> 
		</tr>
		<tr>
			<td>

			</td>
			<td align="right">
				<a class="button-blue"  href="javascript:submitForm()"><?php if (isset($video)) echo 'update!'; else echo 'add!' ?></a>
			</td>  
		</tr>

    </table>
</form> 


<script type="text/javascript">  
	CKEDITOR.replace("description"); 
</script>
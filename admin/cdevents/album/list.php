<?php

$thisSection = 'album';

require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_'.$thisSection.'.php');
?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) { 
	}
} else {
	$link = obrirBD();
	$album_list = getFullAlbums($link);
	tancarBD($link);
} 
?>
 
<table class="table_list" >
	<caption>Album <a class="button-blue" href="index.php?id=0">AddAlbum</a>
	</caption>
	<thead>
		<tr>
			<td>
				id_album
			</td>
			<td>
				id_event
			</td> 
			<td>
				name
			</td> 
			<td>
				path_url
			</td> 
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr>
	</thead>
	<?php foreach ($album_list as $album) { ?>
		<tr>
			<td>
				<?php echo $album['id_'.$thisSection.'']; ?>
			</td>
			<td>
				<?php echo $album['id_event']; ?>
			</td>
 
			<td>
				<?php echo $album['name']; ?>
			</td>
		  	<td>
				<?php echo $album['path_url']; ?>
			</td> 
				<td>
				<?php echo $album['visible']; ?>
			</td> 
			<td>
				<a href="index.php?id=<?php echo $album['id_'.$thisSection.'']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table>  




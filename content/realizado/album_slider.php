<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_album.php');

$link = obrirBD();
$album_list = getAlbumByEvent($_GET['event'], $link);
if (isset($album_list[0])) {
	$path = $album_list[0]['path_url'];
	$pieces = explode(".", $path);
	$ID_ALBUM = $pieces[3];
	?> 


	<div class="content" > 
		<script>
			Galleria.loadTheme('api/galleria/themes/classic/galleria.classic.min.js');
			Galleria.run('#galleria', {
				facebook: 'album:<?php echo $ID_ALBUM; ?>', /*  HAVE TO EDIT THIS!!!*/
				width: 800,
				height: 550,
				lightbox: true});
		</script> 
		<table>
			<tr>
				<td>
					<div id="galleria"></div>
				</td>
			</tr>
			<tr>
				<td>
					<h1> 
						<?php echo $album_list[0]['name']; ?>
					</h1> 
				</td>
			</tr>
		</table> 
	</div>

	<?php
}

tancarBD($link);
?>
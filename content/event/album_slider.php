<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_album.php');

$link = obrirBD();
$album_list = getAlbumByEvent($_GET['event'], $link);

print_r('<pre>');
print_r($album_list);
print_r('</pre>');


if (isset($album_list[0])) {
	?> 

<!--

	<div class="content" > 
		<script>
			Galleria.loadTheme('api/galleria/themes/classic/galleria.classic.min.js');
			Galleria.run('#galleria', {
				facebook: 'album:<?php echo $ID_ALBUM; ?>', /*  HAVE TO EDIT THIS!!!*/
				width: 745,
				height: 550,
				lightbox: true});
		</script>
		<div id="galleria"></div>
	</div>

 -->
	<?php
}

tancarBD($link);
?>
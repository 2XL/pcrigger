

<script>
	Galleria.loadTheme('api/galleria/themes/classic/galleria.classic.min.js');
	Galleria.run('#galleria', {
		facebook: 'album:<?php echo $ID_ALBUM; ?>', /*  HAVE TO EDIT THIS!!!*/
		width: 745,
		height: 550,
		lightbox: true});
</script>
<div id="galleria"></div>
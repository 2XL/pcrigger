<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');

$link = obrirBD();
$home = getActualHome($link);


if (isset($home[0])) 
	{
	$foto_list = getFotosByHome($home[0]['id_home'], $link);
	?>  
	<div id="sliderFrame">
		<div id="ribbon"></div>
		<div id="slider">  
			<?php foreach ($foto_list as $foto){?>
				<img   src="<?php echo $foto['path_url']; ?>" alt="<?php echo $foto['name']; ?>" /> 
			<?php } ?>  
			<?php // aqui hace falta hacer un for each   ?>
		</div>  
	</div>   

<?php
}

tancarBD($link);
?>
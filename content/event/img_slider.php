<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_foto.php');

$link = obrirBD(); 
$foto_list = getFotosByEvent($_GET['event'], $link);
 
if (isset($foto_list[0])) 
	{ 
	?>  
	<div id="sliderFrame">
		<div id="ribbon"></div>
		<div id="slider">  
			<?php foreach ($foto_list as $foto){?>
				<img   src="<?php echo $_PATH . $foto['path_url']; ?>" alt="<?php echo $foto['name']; ?>" /> 
			<?php } ?>  
			<?php // aqui hace falta hacer un for each   ?>
		</div>  
	</div>    
<?php
}

tancarBD($link);
?>
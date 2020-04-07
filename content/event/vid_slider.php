<!--
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');

$link = obrirBD(); 
$video_list = getVideosByEvent($_GET['event'], $link);
 
print_r('<pre>');
print_r($video_list);
print_r('</pre>');


if (isset($video_list[0])) 
	{ 
	?>  
	<div id="sliderVideos"> 
		<div id="slide">  
			<?php foreach ($video_list as $video){?>
				<img   src="<?php echo $video['path_url']; ?>" alt="<?php echo $video['name']; ?>" /> 
			<?php } ?>  
			<?php // aqui hace falta hacer un for each   ?>
		</div> 
		<div id="desc"><?php echo $video['description']; ?></div>
	</div>    
<?php
}

tancarBD($link);
?>

-->
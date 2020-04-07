

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');
?>
<?php
$link = obrirBD();
$video_list = getVideosByEvent($_GET['event'], $link); // get event global spec 
tancarBD($link);
?>

<?php
foreach ($video_list as $video) {
	?>  
	<div class="content">
		<table>  
			<tr>
				<td>
					<iframe width="800" height="450" src="<?php echo $video['path_url']; ?>" frameborder="0" allowfullscreen></iframe>
				</td>
			</tr>  
			<tr>
				<td>
					<h1> 
						<?php echo $video['name']; ?>
					</h1>
					<h3>
						<?php echo $video['description']; ?>
					</h3>
				</td>
			</tr>
		</table> 
	</div>

<?php }
?>
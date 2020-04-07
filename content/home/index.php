<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
 
$link = obrirBD();
$home = getActualHome($link);

if( isset($home[0]) ){
	$home = $home[0];
?> 

<div id="welcome">
	<table>
		<caption>
				<?php echo  $home['titol']; ?>
		</caption>
		<tr>
			<td>
				<?php echo  $home['description']; ?>
			</td>
		</tr>   
	</table>
</div>

<?php }

tancarBD($link);

?>
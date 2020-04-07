<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/visit.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
		<?php require_once($_SERVER['DOCUMENT_ROOT'] . $_PATH . "/head.php"); ?>
    </head>
	<table class="global">
		<tr> 
			<td>
				<table>
					<tr>
						<td > 
							<a href="index.php">
								<img class="logo" src="<?php echo $_PATH . "/img/logoT.png"; ?>" alt="Events Costa Daurada" border="0">
							</a> 
						</td>
						<td> 
							<a href="index.php">
								<img class="title-text" src="<?php echo $_PATH . "/img/titol.jpg"; ?>" alt="Events Costa Daurada" border="0">
							</a>
						</td> 
					</tr>
				</table> 
			</td>
		</tr>
		<tr> 
			<td>
				<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/bar_menu.php"); ?>
			</td>
		</tr>
		<?php if (isset($_GET['event'])) { ?>
		 
			<tr>
				<td>
					<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/content/realizado/index.php"); ?>
				</td>
			</tr> 
		 
			<tr>
				<td>
					<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/content/realizado/album_slider.php"); ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/content/realizado/vid_lister.php"); ?>
				</td>				
			</tr>
			<tr>
				<td >
					<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/content/realizado/fb-plugin.php"); ?>
				</td>				
			</tr>

		<?php }else{ ?>
		<tr>
			<td> 
				<?php require_once( $_SERVER['DOCUMENT_ROOT'] . $_PATH . "/content/realizado/list.php"); ?>
			</td>
		</tr>
		<?php  } ?>
	</table> 





</html>

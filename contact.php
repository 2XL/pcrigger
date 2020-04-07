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
				<?php require_once( $_SERVER['DOCUMENT_ROOT']. $_PATH . "/bar_menu.php"); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php require_once( $_SERVER['DOCUMENT_ROOT']. $_PATH . "/content/contact/contact_save.php"); ?>	
			</td>
		</tr>
		<?php if(isset($_GET['contact'])) { 
			require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH. '/bd/bd_contact.php');
			$link = obrirBD();
			$thisContact = getContactByID($_GET['contact'], $link);
			tancarBD($link);
			 
		?>
		<tr>
			<td>
				<div class="content"> 
					<table>
						<tr>
							<td>
								CONTACT WITH: 
							</td>
							<td> 
								<?php echo $thisContact['contact_with']; ?>
							</td>
							<!--
							<td rowspan="3">
								<img height="100" width="100" src='<?php echo $thisContact['url_path']; ?>' alt="<?php echo $thisContact['contact_with']; ?>">
							</td>
							-->
						</tr> 
						<tr>
							<td>
								Phone
							</td>
							<td>
								<?php echo $thisContact['movil']; ?>
							</td>
						</tr>
						<tr>
							<td>
								Email
							</td>
							<td>
								<?php echo $thisContact['email']; ?>
							</td>
						</tr> 
					</table>
				</div>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td>
				<?php require_once( $_SERVER['DOCUMENT_ROOT']. $_PATH . "/content/contact/contact_form.php"); ?>	
			</td>
		</tr>
		<tr>
			<td>

			</td>				
		</tr>
	</table> 





</html>

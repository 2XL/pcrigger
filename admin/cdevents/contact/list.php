<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contact.php');
?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) {
		// afegir un now contact manager
	}
} else {
	$link = obrirBD();
	$contact_list = getFullContact($link);
	tancarBD($link);
}
?>
 
<table class="table_list" >
	<caption>Contact <a class="button-blue" href="index.php?id=0">AddContact</a>
	</caption>
	<thead>
		<tr>
			<td>
				id
			</td>
			<td>
				movil
			</td>
			<td>
				email
			</td>
			<td>
				contact_with
			</td>
			<td>
				tags
			</td>
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr>
	</thead>
	<?php foreach ($contact_list as $contact) { ?>
		<tr>
			<td>
				<?php echo $contact['id_contact']; ?>
			</td>
			<td>
				<?php echo $contact['movil']; ?>
			</td>
			<td>
				<?php echo $contact['email']; ?>
			</td>
			<td>
				<?php echo $contact['contact_with']; ?>
			</td>
			<td>
				<?php echo $contact['tags']; ?>
			</td>
			<td>
				<?php echo $contact['visible']; ?>
			</td> 	
			<td>
				<a href="index.php?id=<?php echo $contact['id_contact']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table>  
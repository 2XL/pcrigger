<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) {
		// afegir un new home manager
	}
} else {
	$link = obrirBD();
	$home_list = getFullHome($link);
	tancarBD($link);
}

/*
print_r('<pre>');
print_r($home_list);
print_r('</pre>');
*/

?>

<table class="table_list" >
	<caption>Home <a class="button-blue" href="index.php?id=0">AddHome</a>
	</caption>
	<thead>
		<tr>
			<td>
				id
			</td>
			<td>
				titol
			</td>
	<!--		<td>
				description
			</td> -->
			<td>
				id_foto
			</td>
			<td>
				id_video
			</td>
			<td>
				id_album
			</td>
			<td>
				data_home
			</td> 
			<td>
				data_active
			</td> 
			<td>
				data_disible
			</td> 
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr>
	</thead>
	<?php foreach ($home_list as $home) { ?>
		<tr>
			<td>
				<?php echo $home['id_home']; ?>
			</td>
			<td>
				<?php echo $home['titol']; ?>
			</td>
<!--			<td>
				<?php echo $home['description']; ?>
			</td> -->
			<td>
				<?php echo $home['id_foto']; ?>
			</td>
			<td>
				<?php echo $home['id_video']; ?>
			</td>
			<td>
				<?php echo $home['id_album']; ?>
			</td>
			<td>
				<?php echo $home['data_home']; ?>
			</td> 	
			<td>
				<?php echo $home['data_active']; ?>
			</td> 
			<td>
				<?php echo $home['data_disible']; ?>
			</td> 
				<td>
				<?php echo $home['visible']; ?>
			</td> 
			<td>
				<a href="index.php?id=<?php echo $home['id_home']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table> 

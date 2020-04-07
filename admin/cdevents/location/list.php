<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_lloc.php');
?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) {
		// afegir un new home manager
	}
} else {
	$link = obrirBD();
	$lloc_list = getFullLocation($link);
	tancarBD($link);
}

/*
print_r('<pre>');
print_r($lloc_list);
print_r('</pre>');
*/

?>
 
<table class="table_list" >
	<caption>Lloc <a class="button-blue" href="index.php?id=0">AddLocation</a>
	</caption>
	<thead>
		<tr>
			<td>
				id
			</td>
			<td>
				id_event
			</td> 
			<td>
				name
			</td>
			<td>
				latitude
			</td>
			<td>
				altitude
			</td> 
			<td>
				zoom
			</td> 
			<td>
				path_url
			</td> 
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr>
	</thead>
	<?php foreach ($lloc_list as $lloc) { ?>
		<tr>
			<td>
				<?php echo $lloc['id_lloc']; ?>
			</td>
			<td>
				<?php echo $lloc['id_event']; ?>
			</td>
 
			<td>
				<?php echo $lloc['name']; ?>
			</td>
			<td>
				<?php echo $lloc['latitude']; ?>
			</td>
			<td>
				<?php echo $lloc['altitude']; ?>
			</td> 	
			<td>
				<?php echo $lloc['zoom']; ?>
			</td> 
			<td>
				<?php echo $lloc['path_url']; ?>
			</td> 
				<td>
				<?php echo $lloc['visible']; ?>
			</td> 
			<td>
				<a href="index.php?id=<?php echo $lloc['id_lloc']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table>  
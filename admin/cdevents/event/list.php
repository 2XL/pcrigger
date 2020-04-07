<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
?>

<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if ($id == 0) {
		// afegir un now contact manager
	}
} else {
	$link = obrirBD();
	$event_list = getFullEvents($link);
	tancarBD($link);
}
?>


<table class="table_list" >
	<caption>Event <a class="button-blue" href="index.php?id=0">CreateEvent</a>
	</caption>
	<thead>
		<tr>
			<td>
				id_event
			</td>
			<td>
				id_foto
			</td>
			<td>
				name
			</td>
			<td>
				data_event
			</td> 
			<td>
				lloc
			</td>
			<td>
				hora
			</td>
			<td>
				coordinador
			</td>
			<td>
				preu
			</td>
			<td>
				places
			</td>
			<td>
				visible
			</td> 
			<td>
				edit
			</td>
		</tr>
	</thead>
	<?php foreach ($event_list as $event) { ?>
		<tr>
			<td>
				<?php echo $event['id_event']; ?>
			</td>
			<td>
				<?php echo $event['id_foto']; ?>
			</td>
			<td>
				<?php echo $event['name']; ?>
			</td>
			<td>
				<?php echo $event['data_event']; ?>
			</td> 
			<td>
				<?php echo $event['lloc']; ?>
			</td>
			<td>
				<?php echo $event['hora']; ?>
			</td>
			<td>
				<?php echo $event['coordinador']; ?>
			</td>
			<td>
				<?php echo $event['preu']; ?>
			</td>
			<td>
				<?php echo $event['places']; ?>
			</td>
			<td>
				<?php echo $event['visible']; ?>
			</td> 	
			<td>
				<a href="index.php?id=<?php echo $event['id_event']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>
		</tr>
	<?php } ?> 
</table>   
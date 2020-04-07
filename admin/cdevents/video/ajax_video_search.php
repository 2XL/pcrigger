<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');

$name = $_POST['filtro'];
$id_event = $_POST['id_event'];
$id_home = $_POST['id_home'];
$order = $_POST['ordenar'];
$page = $_POST['page'];
$numCupsPage = $_POST['mostrarporpagina'];
$asc_desc = $_POST['asc_desc'];

$link = obrirBD();
$test = getVideosWithFilters($name, $id_event, $id_home, $order, $page, $numCupsPage, $asc_desc, $link);
$max = getVideosWithFiltersLength($name, $id_event, $id_home, $link);
 
tancarBD($link);
$ultimo = floor($max / $numCupsPage);
?> 
<table class="table_list" >     
    <thead>
		<tr>
			<td style="width:10%;">
				id_video
			</td>
			<td style="width:10%;">
				id_event
			</td>
			<td style="width:10%;">
				id_home
			</td>
			<td style="width:20%;">
				name
			</td>  
			<td style="width:30%;">
				data_insertion
			</td>
			<td style="width:20%;">
				edit
			</td>

		</tr>
	</thead>

	<?php foreach ($test as $t) { ?> 
		<tr>
			<td>
				<?php echo $t['id_video']; ?>
			</td>
			<td>
				<?php echo $t['id_event']; ?> 
			</td>
			<td>
				<?php echo $t['id_home']; ?>
			</td>
			<td>
				<?php echo $t['name']; ?>
			</td> 
			<td>
				<?php echo $t['date_insertion']; ?>
			</td> 
			<td>

				<a href="index.php?id=<?php echo $t['id_video']; ?>">
					<img src="<?php echo $_PATH . '/admin/images/icons/icon-edit.png'; ?>"  />
				</a>
			</td>

		</tr> 
	<?php } ?>            


	<tr >
		<td colspan="2">
			<?php if ($page > 0) { ?>
				<a class="button-blue"  href="javascript:submitActualizarFiltro(<?php $last = $page - 1;
				echo $last; ?>)"> Anterior </a>
			<?php } ?>
		</td>
		<td colspan="2">
			<?php echo 'Pagina ' . $page . ' de ' . $ultimo; ?>
		</td>

		<td colspan="2">
			<?php if ($page < $ultimo) { ?>
				<a class="button-blue"  href="javascript:submitActualizarFiltro(<?php $next = $page + 1;
			echo $next; ?>)"> Siguiente </a>
<?php } // falta implementar ir a la ultima pagina...   ?>
		</td>
	</tr>

</table>
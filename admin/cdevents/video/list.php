<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_video.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_home.php');
$page = 0;


$link = obrirBD(); 

?> 
 
<script type="text/javascript">
    function submitActualizarFiltro(page){
        var filtro = document.getElementById('filtro').value;
        var event = document.getElementById('event').value;
        var home = document.getElementById('home').value;
		
        var orderby = document.getElementById('orderby').value; 
        var entporpag = document.getElementById('entporpag').value;
        var asc_desc = document.getElementById('asc_desc').value;
        var pagina = page; 
		
        $.post(
		"ajax_video_search.php", 
		{
			filtro : filtro,
			id_event : event,
			id_home : home,
					
			ordenar : orderby, 
			mostrarporpagina : entporpag,
			page : pagina,
			asc_desc : asc_desc
		}, 
		function(data){
			var formulario = document.getElementById('lista_resultados');
			formulario.innerHTML = data;
		}
	);
    } 
</script>  

<table class="table_list" >
    <caption>Menu Videos</caption> 
    <thead>
        <tr>
            <td style="width:30%;">
				Buscar
            </td>
            <td style="width:10%;">
				Event 
            </td>
            <td style="width:20%;">
				Home
            </td>   
			<td>
				Ordenar
			</td>
			<td>
				Orden
			</td>
            <td style="width:20%;">
				Pagina 
            </td>
            <td>
				Filtrar
            </td>
			<td>
				Añadir
            </td>
        </tr>
    </thead> 
	<tr> 
		<td>
			<input type="text" style="width:100%;" name="filtro" id="filtro" >
		</td> 
		<td>
			<select name="event" id="event" >
				<?php
				$event_options = getEventsForSelect($link);


				foreach ($event_options as $option) {
					?>
					<option value="<?php echo $option['id_event']; ?>"><?php echo $option['name']; ?></option>
				<?php } ?>
				<option value="[0-9]*" selected>all</option>
			</select>
		</td>

		<td>
			<select name="home" id="home" >
				<?php
				$home_options = getHomesForSelect($link);


				foreach ($home_options as $option) {
					?>
					<option value="<?php echo $option['id_home']; ?>"><?php echo $option['titol']; ?></option>
				<?php } ?>
				<option value="[0-9]*" selected>all</option>
			</select>
		</td>	 



		<td>
			<select name="orderby" id="orderby"> 
				<option value="id_video">video</option> 
				<option value="id_event">Event</option>
				<option value="id_home">Home</option>
				<option value="date_insertion">DateCreation</option> 
				<option value="name">Name</option> 
			</select>
		</td>



		<td>
			<select name="asc_desc" id="asc_desc">
				<option value="asc">Ascendente</option>
				<option value="desc">Descendiente</option>
			</select>
		</td>
		<td>
			<select name="entporpag" id="entporpag"> 
				<option value="10">10</option>
				<option value="20" selected>20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		</td>


		<td>  
			<a class="button-blue"  href="javascript:submitActualizarFiltro(<?php echo $page; ?>)"> Mostrar Videos </a>
		</td>
		<td>
			<a class="button-blue"  href="index.php?id=0" > Añadir Video </a>
		</td>
	</tr> 
</table>

<div id="lista_resultados"></div>


<?php
tancarBD($link);
?>

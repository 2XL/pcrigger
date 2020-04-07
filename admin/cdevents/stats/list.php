<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_web_visitant.php');



if (isset($_REQUEST['tini']) && isset($_REQUEST['tfin'])) {
	$timeInit = $_REQUEST['tini'];
	$timeFinal = $_REQUEST['tfin'];
}

/* REQUESTING THE DATABASE */

$link = obrirBD();
$visits = countFullVisitants($link);
$visitsUnique = countUniqueFullVisitants($link);

if (isset($timeInit) && isset($timeFinal)) {
	$visitsBeetween = countVisitantsBetween($timeInit, $timeFinal, $link);
	$visitsUniqueBeetween = countUniqueVisitantsBetween($timeInit, $timeFinal, $link);
}
tancarBD($link);
?>
<!-- DISPLAYING THE STATS --> 
<script type="text/javascript" >
    function submitForm()
    {
		document.forms['stats_form'].submit();
    }
</script>

<form name="stats_form" method="POST" id="stats_form" action="index.php" >
	<table class="table_list">
		<thead>
			<tr>
				<td>
					data_init
				</td>
				<td>
					data_fi
				</td>
				<td align="right">
					submit
				</td>   
			</tr>  
		</thead> 
		<tr>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($timeInit)) echo date("d-m-Y", strtotime($timeInit)); ?>" name="tini" >
			</td>
			<td>
				<input class="datepicker" type="text" value="<?php if (isset($timeFinal)) echo date("d-m-Y", strtotime($timeFinal)); ?>" name="tfin" >
			</td>
			<td>
				<a class="button-blue"  href="javascript:submitForm()"><?php echo 'SubmitDates' ?></a>
			</td> 
		</tr> 
	</table>
</form>

<?php
?>
<table class="table_list">
	<tr>
		<td>
			Visitas Total
		</td>
		<td>
			<?php echo $visits; ?>

		</td>	
	</tr>
	<tr>
		<td>
			Visitas Unicas
		</td>
		<td>
			<?php echo $visitsUnique; ?>
		</td>
	</tr>
	<?php if (isset($timeInit) && isset($timeFinal)) { ?>
		<tr>
			<td>
				Visitas Entre
			</td>
			<td>
				<?php echo $visitsBeetween; ?>
			</td>
		</tr>

		<tr>
			<td>
				Visitas Unicas Entre
			</td>
			<td>
				<?php echo $visitsUniqueBeetween; ?>
			</td>
		</tr> 
	<?php } ?>

</table>
<?php if (isset($timeInit) && isset($timeFinal)) { ?>
	<table class="table_list" >
		<tr>
			<td> 
				<?php require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/cdevents/stats/charts/chart_visitors.php'); ?>
			</td>
		</tr>
	</table>
<?php } ?>
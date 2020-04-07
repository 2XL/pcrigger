<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_event.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_promo.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_lloc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contact.php');
?>


<?php
$link = obrirBD();
$m_event_proximos = getVisibleEventsProximos($link);
$m_event_realizados = getVisibleEventsRealizados($link);
$m_promo = getVisiblePromos($link);
$m_lloc = getVisibleLlocs($link);
$m_contact = getVisibleContacts($link);
tancarBD($link);
?> 

<div>
	<ul id="menu-bar">
		<li class="active">
			<a href="<?php echo $_PATH; ?>/home.php">HOME</a>
		</li> 
		<li><a href="<?php echo $_PATH; ?>/event.php">EVENTOS PROXIMOS</a> 
			<ul> 
				<?php
				if (count($m_event_proximos) > 0) {
					foreach ($m_event_proximos as $event) {
						?>
						<li><a href="<?php echo $_PATH; ?>/event.php?event=<?php echo $event['id_event']; ?>">
								<?php echo $event['name']; ?>
							</a>
						</li> 
						<?php
					}
				} else {
					?>
					<li><a href="<?php echo $_PATH; ?>/event.php?event=<?php echo $event['id_event']; ?>">
							None
						</a>
					</li>
				<?php } ?> 
			</ul>
		</li>
		<li><a href="<?php echo $_PATH; ?>/promo.php">OFERTAS</a>
			<ul>
				<?php foreach ($m_promo as $promo) { ?>
					<li><a href="<?php echo $_PATH; ?>/promo.php?promo=<?php echo $promo['id_promo']; ?>"><?php echo $promo['name']; ?></a></li> 
				<?php } ?> 
			</ul>
		</li>
		<li>
			<a href="<?php echo $_PATH; ?>/realizado.php">EVENTOS ANTERIORES</a> <!-- <?php echo $_PATH; ?>/realizado.php -->
			<ul> 
				<?php
				if (count($m_event_realizados) > 0) {
					foreach ($m_event_realizados as $event) {
						?>
						<li><a href="<?php echo $_PATH; ?>/realizado.php?event=<?php echo $event['id_event']; ?>">
								<?php echo $event['name']; ?>
							</a>
						</li> 
						<?php
					}
				} else {
					?>
					<li><a href="<?php echo $_PATH; ?>/realizado.php?event=<?php echo $event['id_event']; ?>">
							None
						</a>
					</li>
				<?php } ?> 
			</ul>
		</li> 
		<li><a href="#">COMO LLEGAR</a> <!-- <?php echo $_PATH; ?>/location.php -->
			<ul>
				<?php foreach ($m_lloc as $lloc) { ?>
					<li><a href="<?php echo $_PATH; ?>/location.php?lloc=<?php echo $lloc['id_lloc']; ?>"><?php echo $lloc['name']; ?></a></li> 
				<?php } ?> 
			</ul>
		</li>
		<li><a href="https://www.facebook.com/BoatPartiesCostaDaurada" TARGET="_blank" >FACEBOOK</a> 
		</li>
		<li><a href="<?php echo $_PATH; ?>/contact.php">RESERVAS</a>
			<ul>
				<?php foreach ($m_contact as $contact) { ?>
					<li><a href="<?php echo $_PATH; ?>/contact.php?contact=<?php echo $contact['id_contact']; ?>"><?php echo $contact['contact_with']; ?></a></li> 
				<?php } ?> 
			</ul>
		</li>

	</ul>
</div>

<?php
// http://honeyandlance.com/wp-content/uploads/2010/04/secretary-sexy-1.jpg
// suposar que hi haura un home de festes o directament amb el menu bar anar un event especific? nose xoradas a tope xD
?>
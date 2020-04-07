<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH.  '/content/contact/contact_request.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH.  '/content/contact/samplemail.php'); 

?>

<script type="text/javascript" >
    function submitForm()
    {
		alert('Message Delivered!');
		document.forms['contactar'].submit();
    }
</script>

<div id="contact_bar" style="width: 800px; margin-left: auto; margin-right: auto;">

	<form id="contactar" name="contactar" action="<?php echo $_PATH. '/contact.php'; if(isset($_GET['contact'])) echo '?contact='.$_GET['contact']; ?>" method="post"> 
		<?php if(isset($_GET['contact'])){ ?>
		<input type="hidden" name="id_contact" value="<?php echo $_GET['contact']; ?>">
		<?php	} ?>
		<input type="hidden" name="enviar_bd" >
		<input type="hidden" name="samplemail" >
		<table id="contact_form" >
			<tr>
				<td style="text-align: right; padding: 10px;" >
					Nombre
				</td>
				<td>
					<input name="nombre" id="name" type="text">
				</td> 
				<td rowspan="5">
					<div style=" padding: 20px;">
						<img src="<?php echo $_PATH . '/img/karya_main/f11.jpg'; ?>" alt="Suport"  >
					</div> 
				</td>
			</tr> 
			<tr>
				<td style="text-align: right;  padding: 10px;">
					Email
				</td>
				<td>
					<input name="email" id="email" type="text">
				</td> 
			</tr>  
			<tr>
				<td style="text-align: right;  padding: 10px;">
					Telefon
				</td>
				<td>
					<input name="telefono" id="code" type="text">
				</td> 
			</tr> 
			<tr>
				<td style="text-align: right;  padding: 10px;">
					Asunto
				</td>
				<td>
					<input name="asunto" id="code" type="text">
				</td> 
			</tr> 
			<tr>       
				<td style="text-align: right;  padding: 10px; vertical-align: top;"> 
					Mensaje
				</td>
				<td>
					<textarea style="height: 100%; width: 100%;" rows="5" cols="50" id="description" name="mensaje"></textarea>
				</td>
			</tr>
			<tr> 
				<td colspan="2" rowspan="2">
					<div style="height: 80px;">
						<br> 
						<a  style="text-decoration: none;" class="contact_button"  href="javascript:submitForm()">Contactar</a>  
					</div>
				</td>
			</tr> 
		</table> 
	</form>	
 
</div>

 
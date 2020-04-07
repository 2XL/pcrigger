<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_contact.php');
?>

<?php
$link = obrirBD();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
if ($id == 0) { // afegir un contact
	
	
} else { // editar un contact
	$contact = getContactByID($_GET['id'], $link);
}
tancarBD($link); 
?>


<script type="text/javascript" >
    function submitForm()
    {
		document.forms['contact_form'].submit();
    }
</script>

 

 
<form name="contact_form" method="POST" id="contact_form" action="save_contact.php" enctype="multipart/form-data">
    <table class="table_edit" >
        <caption>Contact - <?php if($_GET['id']== 0) echo 'Add'; else echo 'Edit'; ?></caption>

		<tr>
			<td>
				<?php if(isset($contact)) echo 'id' ?>
			</td>
			<td>
				<?php if(isset($contact)) echo $contact['id_contact']; ?>
				<input type="hidden" value="<?php if(isset($contact)) echo $contact['id_contact']; else echo 0; ?>" name="id_contact" >
			</td>
		</tr>
		<tr>
			<td>
				movil
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['movil']; ?>" name="movil" >
			</td>
		</tr> 
		<tr>
			<td>
				email
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['email']; ?>" name="email" >
			</td>
		</tr>
		<tr>
			<td>
				contact_with
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['contact_with']; ?>" name="contact_with" >
			</td>
		</tr>
		<tr>
			<td>
				tags
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['tags']; ?>" name="tags" >
			</td>
		</tr>
		<tr>
			<td>
				visible
			</td>
			<td>
				<input type="checkbox" <?php if(isset($contact)) if($contact['visible']==1) echo 'checked'; ?> name="visible" >
			</td>
		</tr>
		<tr>
			<td>
				movil_re
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['movil_re']; ?>" name="movil_re" >
			</td>
		</tr>
		<tr>
			<td>
				email_re
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['email_re']; ?>" name="email_re" >
			</td>
		</tr>
		<tr>
			<td>
				address
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['address']; ?>" name="address" >
			</td>
		</tr>
		<tr>
			<td>
				avatar
			</td>
			<td>
				<input type="text" value="<?php if(isset($contact)) echo $contact['url_path']; ?>" name="url_path" >
			</td> 
		</tr> 
		<tr>
			<td>
				
			</td>
			<td align="right">
				 <a class="button-blue"  href="javascript:submitForm()">update!</a>
			</td>  
		</tr>
    </table>
</form>
  
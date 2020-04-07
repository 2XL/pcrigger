<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd.php');
?>

<div id="header">
    <table style="width: 100%;">
		<tr style="height: 27px;">
			<td><span id="datetime"><?php whats_the_time(); ?></span></td>
			<td></td>
			<td align="right">
				<span>Welcome, <strong><?php echo $_USUARIO['username']; ?></strong></span>
				<span>|</span>
				<a href="<?php echo $_PATH . "/admin/logout.php"; ?>" class="logout">Logout</a>
			</td>
		</tr>
		<tr style="height: 77px;">
			<td>
				<a href="<?php echo $_PATH . "/admin/cdevents"; ?>" class="logo"><?php echo $_WEBNAME; ?></a>
			</td>
			<td style="vertical-align: bottom;">
				<span style="font-size: x-large;">
				</span>
			</td>
			<td align="right" style="vertical-align: top;">
				<table id="header_menu">
				</table>
			</td>
		</tr>
    </table>
</div>
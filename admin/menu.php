<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');

$link = obrirBD();


$url = explode("/", $_SERVER['PHP_SELF']);
$menu = $url[count($url) - 2];
?>



<table id="menu" cellpadding="0" cellspacing="0">
    <tr class="first <?php if ($menu == "stats") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/stats"; ?>">
                Stats 
            </a>
        </td>
    </tr>
	<tr class="<?php if ($menu == "home") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/home"; ?>">
                Home 
            </a>
        </td>
    </tr> 
    <tr class="<?php if ($menu == "event") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/event"; ?>">
                Events 
            </a>
        </td>
    </tr> 
	<tr class="<?php if ($menu == "promo") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/promo"; ?>">
                Promocions 
            </a>
        </td>
    </tr> 
    <tr class="<?php if ($menu == "foto") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/foto"; ?>">
                Fotos 
            </a>
        </td>
    </tr>
	<tr class="<?php if ($menu == "album") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/album"; ?>">
                Albums 
            </a>
        </td>
    </tr>

    <tr class="last <?php if ($menu == "video") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/video"; ?>">
                Videos  
            </a>
        </td>
    </tr>
	<tr class="last <?php if ($menu == "location") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/location"; ?>">
                Location  
            </a>
        </td>
    </tr>
	<tr class="<?php if ($menu == "contact") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/cdevents/contact"; ?>">
                Contact  
            </a>
        </td>
    </tr>
</table>



<?php
tancarBD($link);
?>

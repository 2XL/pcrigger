<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_pcrigger.php');  
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/visit.php');

setcookie("idUser", "", time()+(3600*8));
setcookie("tokenUser", "", time()+(3600*8));
unset($_COOKIE['idUser']);
unset($_COOKIE['tokenUser']);  
if (isset($_POST['login'])) {
    header("Location: ".$_PATH."/admin/login.php?logout");
} else {
    header("Location: ".$_PATH."/admin/login.php?error");
}  
?>

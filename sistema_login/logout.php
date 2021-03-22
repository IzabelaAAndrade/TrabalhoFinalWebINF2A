<?php
session_start();
unset($_SESSION['usuario']);
header('Location: tela_login.php');
exit();
?>

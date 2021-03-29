<?php
if(!$_SESSION['usuario']){
    header('Location: tela_login.php');
    exit();
}
?>

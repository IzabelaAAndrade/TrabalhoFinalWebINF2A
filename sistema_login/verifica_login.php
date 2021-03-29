<?php
if(!$_SESSION['usuario']){
    header('Location:/TrabalhoFinalWebINF2A/sistema_login/tela_login.php');
    exit();
}
?>

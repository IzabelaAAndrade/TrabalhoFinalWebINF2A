<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */

define('SERVER', 'localhost');
define('USER', 'root');
define('PWORD', '');
define('DB', 'biblioteca');

// Cria conexão
$conexao = new mysqli(SERVER, USER, PWORD, DB);
// Verifica
if ($conexao->connect_error) {
  die("falha na conexão: " . $conexao->connect_error);
}

function close($conexao) {
    $conexao->close();
}

?>

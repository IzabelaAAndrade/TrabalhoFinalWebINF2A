<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */

define('SERVER', 'localhost');
define('USER', 'userlegal');
define('PWORD', 'senhalegal');
define('DB', 'biblioteca');

// Cria a conexão
$conn = new \mysqli(SERVER, USER, PWORD, DB);

// Verifica
if ($conn->connect_error)
  die("falha na conexão: " . $conn->connect_error);

?>
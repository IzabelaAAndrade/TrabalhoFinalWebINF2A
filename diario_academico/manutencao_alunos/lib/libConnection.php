<?php
//Ideia do grupo G

define('SERVER', 'localhost');
define('USER', 'root');
define('PWORD', '');
define('DB', 'academico');

// Cria a conexão
$conexao = new \mysqli(SERVER, USER, PWORD, DB);

// Verifica
if ($conexao->connect_error)
  die("falha na conexão: " . $conexao->connect_error);

?>
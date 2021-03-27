<?php

define("DB_HOST","localhost");
define("DB_USER","userlegal");
define("DB_PASSWORD","senhalegal");
define("DB_DATABASE","academico");

$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conexao)
    die("<p class='nenhumResultado'p>Conexão falhou: " . mysqli_connect_error()."</p>");

?>
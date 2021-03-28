<?php

define("DB_HOST","localhost");
define("DB_USER","userlegal");
define("DB_PASSWORD","senhalegal");
define("DB_DATABASE","academico");
    
// Conexão com o BD
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$link)
    die("Conexão falhou: " . mysqli_connect_error());

?>
<?php
session_start();
//dados relativos ao banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nome_db = "biblioteca";
$povoa_tabelas = "povoa_tabelas.sql";




mysqli_close($conexao);
header("Location: cria_reserva.php?data='". $data_disponivel ."'");


?>

<?php
session_start();
$id = $_SESSION['reserva_a_ser_alterada'];
$id_acervo = $_GET['id_itens'];
$data_reserva = $_GET['estimativa_reserva'];
$conexao = mysqli_connect("localhost", "root", "", "biblioteca") or die("Erro de conexão!");
$query = "UPDATE reservas SET id_acervo='$id_acervo', data_reserva='$data_reserva' where id = '" . $id . "'";
mysqli_query($conexao,$query);
unset($_SESSION['reserva_a_ser_alterada']);
mysqli_close($conexao);
$_SESSION["confirma"] = "6";
header('location: cria_reserva.php');
?>
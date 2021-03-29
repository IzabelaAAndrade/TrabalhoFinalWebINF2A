<?php
session_start();
$id = $_SESSION['reserva_a_ser_deletado'];
$conexao = mysqli_connect("localhost", "root", "", "biblioteca") or die("Erro de conexão!");
$query = "DELETE FROM reservas where id = '" . $id . "'";
mysqli_query($conexao,$query);
unset($_SESSION['reserva_a_ser_deletado']);
mysqli_close($conexao);
$_SESSION["confirma"] = "5";
header('location: cria_reserva.php');
?>
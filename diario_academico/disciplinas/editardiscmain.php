<?php
session_start();
$idn = $_GET['id'];
$idt = $_GET['id_turmas'];
$nome = $_GET['nome'];
$min = $_GET['min'];
$qual = $_SESSION['funciona'];

$cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
$sql = "update disciplinas set id = '".$idn."',id_turmas = '".$idt."',nome = '".$nome."',carga_horaria_min = '".$min."' where id = '".$table[$qual][0]."' and id_turmas = '".$table[$qual][1]."' and nome = '".$table[$qual][2]."' and carga_horaria_min = '".$table[$qual][3]."'";
mysqli_query($cnx, $sql);
  $_SESSION["sts"] = "3";
  unset($_SESSION['funciona']);
  header('location: disciplinasindex.php');
?>

<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id_etapa=$_POST['etapa'];
$id_disciplina=$_POST['disciplina'];
$conteudo=$_POST['conteudo'];
$data_inicio=$_POST['data_inicio'];
$data_final=$_POST['data_final'];
$data = date('d-m-Y', strtotime(str_replace('-','/', $data_inicio)))." à ".date('d-m-Y', strtotime(str_replace('-','/', $data_final)));
mysqli_query($con,"INSERT INTO conteudos(id_etapas,id_disciplinas,conteudos,datas) VALUES ('$id_etapa','$id_disciplina','$conteudo','$data')");
echo "<script>location.href='conteudo.php'</script>";
?>

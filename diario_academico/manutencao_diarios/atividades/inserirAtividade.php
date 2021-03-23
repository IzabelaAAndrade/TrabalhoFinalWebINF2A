<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id_disciplinas=$_POST['disciplinas'];
$nome=$_POST['nome'];
$data=$_POST['data'];
$valor=$_POST['valor'];
mysqli_query($con,"INSERT INTO atividades(id_disciplinas,nome,data,valor) VALUES ('$id_disciplinas','$nome','$data','$valor')");
echo "<script>location.href='atividade.php'</script>";
?>

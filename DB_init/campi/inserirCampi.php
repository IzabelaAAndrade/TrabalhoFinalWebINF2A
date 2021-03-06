<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$nome=$_POST['nome'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
mysqli_query($con,"INSERT INTO campi(nome,cidade,uf) VALUES ('$nome','$cidade','$uf')");
echo "<script>location.href='campi.php'</script>";
?>

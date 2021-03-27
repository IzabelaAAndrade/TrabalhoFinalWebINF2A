<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$verif=true;
$id=$_POST['id'];
$sql=mysqli_query($con,"SELECT * FROM diario WHERE id_atividades='$id'");
if (mysqli_num_rows($sql) > 0) {
  echo "<script>alert('Não é possível deletar essa atividade');</script>";
}
else{
  mysqli_query($con,"DELETE FROM atividades WHERE id='$id'");
}
echo "<script>location.href='atividade.php'</script>";
?>

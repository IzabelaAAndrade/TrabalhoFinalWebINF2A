<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id=$_POST['id'];
$sql=mysqli_query($con,"SELECT * FROM diario WHERE id_conteudos='$id'");
if (mysqli_num_rows($sql) > 0) {
  echo alert("Não é possível deletar esse conteúdo");
}
else{
  mysqli_query($con,"DELETE FROM conteudos WHERE id='$id'");
}

echo "<script>location.href='conteudo.php'</script>";
?>

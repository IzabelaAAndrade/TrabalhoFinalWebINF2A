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
$id_disciplinas=$_POST['disciplinas'];
$nome=$_POST['nome'];
$data=$_POST['data'];
$valor=$_POST['valor'];
$sql=mysqli_query($con,"SELECT * FROM disciplinas WHERE id='$id_disciplinas'");
if (mysqli_num_rows($sql) > 0) {
  $sql=mysqli_query($con,"SELECT * FROM atividades WHERE id_disciplinas='$id_disciplinas'");
  while($ln = mysqli_fetch_assoc($sql)){
    if(strcmp($nome,$ln['nome'])==0 && strtotime($data) == strtotime($ln['data']) && strcmp($valor,$ln['valor'])==0 ){
      $verif=false;
      echo "<script>alert('Não é possível inserir essa atividade!');</script>";
      echo "<script>location.href='atividade.php'</script>";

    }
  }
}
else{
  echo "<script>alert('Não é possível inserir essa atividade');</script>";
  echo "<script>location.href='atividade.php'</script>";
  $verif=false;
}
if($verif==true){
  mysqli_query($con,"INSERT INTO atividades(id_disciplinas,nome,data,valor) VALUES ('$id_disciplinas','$nome','$data','$valor')");
  echo "<script>location.href='atividade.php'</script>";
}
?>

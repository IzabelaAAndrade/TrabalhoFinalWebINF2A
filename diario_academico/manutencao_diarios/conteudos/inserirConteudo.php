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
$id_disciplinas=$_POST['disciplina'];
$conteudo=$_POST['conteudo'];
$data_inicio=$_POST['data_inicio'];
$data_final=$_POST['data_final'];
$data = date('d-m-Y', strtotime(str_replace('-','/', $data_inicio)))." à ".date('d-m-Y', strtotime(str_replace('-','/', $data_final)));
$verif = true;

$sql=mysqli_query($con,"SELECT * FROM disciplinas WHERE id='$id_disciplinas'");
if (mysqli_num_rows($sql) > 0) {
  $sql=mysqli_query($con,"SELECT * FROM conteudos WHERE id_disciplinas='$id_disciplinas'");
  while($ln = mysqli_fetch_assoc($sql)){
    if($id_etapa==$ln['id_etapas'] && strcmp($conteudo,$ln['conteudos'])==0 && strcmp($data,$ln['datas'])==0  ){
      $verif=false;
      echo "<script>alert('Não é possível inserir esse conteúdo');</script>";
      echo "<script>location.href='conteudo.php'</script>";

    }
  }
}
else{
  echo "<script>alert('Não é possível inserir esse conteúdo');</script>";
  echo "<script>location.href='conteudo.php'</script>";
  $verif=false;
}
if($verif==true){
  mysqli_query($con,"INSERT INTO conteudos(id_etapas,id_disciplinas,conteudos,datas) VALUES ('$id_etapa','$id_disciplinas','$conteudo','$data')");
  echo "<script>location.href='conteudo.php'</script>";
}
echo "<script>location.href='conteudo.php'</script>";
?>

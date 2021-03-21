<?php
session_start();
$cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);

$tem = false;

$idt = $_GET['id_turmas'];
$nome = $_GET['nome'];
$min = $_GET['min'];

for ($i=0; $i < count($table) ; $i++) {
  if($idt == $table[$i][1] && $nome == $table[$i][2] && $min == $table[$i][3]){
    $tem = true;
  }
}

if($tem == false){
  if($idt != null && $nome != null && $min != null){
    if($idt!=-1){
      $sql = "insert into disciplinas (id_turmas, nome,carga_horaria_min)
      values ('".$idt."','".$nome."','".$min."')";
      $resultid = mysqli_query($cnx, $sql);
      $_SESSION["sts"] = "1";
    } else {
      $_SESSION["sts"] = "5";
      unset($_SESSION['funciona']);
    }
  } else{
    $_SESSION["sts"] = "5";
  }
} else {
  $_SESSION["sts"] = "2";
}
header('location: disciplinas_index.php');
mysqli_close($cnx);
?>

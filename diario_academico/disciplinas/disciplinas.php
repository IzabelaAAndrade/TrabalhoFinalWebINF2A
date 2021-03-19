<?php
session_start();
$cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);

$tem = false;

$idn = $_GET['id'];
$idt = $_GET['id_turmas'];
$nome = $_GET['nome'];
$min = $_GET['min'];

for ($i=0; $i < count($table) ; $i++) {
  if($idn == $table[$i][0] && $idt == $table[$i][1] && $nome == $table[$i][2] && $min == $table[$i][3]){
    $tem = true;
  }
}

if($tem == false){
  $sql = "insert into disciplinas (id,id_turmas, nome,carga_horaria_min)
values ('".$idn."','".$idt."','".$nome."','".$min."')";
  $resultid = mysqli_query($cnx, $sql);
  $_SESSION["sts"] = "1";
} else {
  $_SESSION["sts"] = "2";
}
header('location: disciplinasindex.php');
mysqli_close($cnx);
?>

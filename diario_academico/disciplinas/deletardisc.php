<?php
  session_start();
  $qual = $_GET['qual'];
  $cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
  $sql = 'select * from disciplinas';
  $result = mysqli_query($cnx, $sql);
  $table = mysqli_fetch_all($result);
  $sql = "delete from disciplinas where id = '".$table[$qual][0]."' and id_turmas = '".$table[$qual][1]."' and nome = '".$table[$qual][2]."' and carga_horaria_min = '".$table[$qual][3]."'";
  mysqli_query($cnx, $sql);
    $_SESSION["sts"] = "4";
    header('location: disciplinasindex.php');
  ?>
?>

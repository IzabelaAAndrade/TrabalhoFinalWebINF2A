<?php
  session_start();
  $qual = $_GET['qual'];
  $cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
  $sql = "delete from disciplinas where id = '".$qual."'";
  mysqli_query($cnx, $sql);
    $_SESSION["sts"] = "4";
    header('location: disciplinas_index.php');
  ?>
?>

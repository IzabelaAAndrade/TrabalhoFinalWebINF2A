<?php
session_start();
if(!isset($_SESSION["sts"])){
  $_SESSION["sts"] = "0";
}
if($_SESSION["sts"] == "1"){
  echo "<script>alert('Disciplina Cadastrada com Sucesso!');</script>";
  unset($_SESSION["sts"]);
} else if($_SESSION["sts"] == "2"){
  echo "<script>alert('Disciplina já Cadastrada!');</script>";
  unset($_SESSION["sts"]);
} else if($_SESSION["sts"] == "3"){
  echo "<script>alert('Disciplina Alterada com Sucesso!');</script>";
  unset($_SESSION["sts"]);
} else if($_SESSION["sts"] == "4"){
  echo "<script>alert('Disciplina Apagada com Sucesso!');</script>";
  unset($_SESSION["sts"]);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Disciplinas:)</title>
  </head>
  <body>
    <form action="disciplinas.php" method="get">
      <input type="text" name="id" value="">
      <select name="id_turmas">
        <?php
        $cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
        $sql = 'select * from turmas';
        $result = mysqli_query($cnx, $sql);
        $table = mysqli_fetch_all($result);
        for ($i=0; $i < count($table); $i++) {
          echo "<option value=".$table[$i][0].">".$table[$i][0]."</option>";
        }
        mysqli_close($cnx);
        ?>
      </select>
      <input type="text" name="nome" value="">
      <input type="number" name="min" value="">
      <input type="submit" value="VAILA">
    </form>

<?php
$cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
for ($i=0; $i < count($table) ; $i++) {
  echo $table[$i][0]." ";
  echo $table[$i][1]." ";
  echo $table[$i][2]." ";
  echo $table[$i][3]." ";
  echo "<button name='editar' class ='pegar' value = '".$i."'>Editar</button>";
  echo "<button name='deletar' class ='pegar' value = '".$i."'>Deletar</button>";
  echo "<br>";
}
mysqli_close($cnx);
?>
<script type="text/javascript" src="editarexcluir.js"></script>
</body>
</html>

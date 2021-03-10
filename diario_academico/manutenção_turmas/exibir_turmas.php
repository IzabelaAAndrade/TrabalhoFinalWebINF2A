<head>
<title>Mostrar turmas</title>
</head>

<?php
include 'conect_bd.php';

$get = $_GET['id'];




$sql1 = "SELECT id, id_cursos, nome FROM turmas WHERE id_cursos = '".$_GET['id']."'";
$sql = "SELECT id, nome FROM cursos WHERE id = '".$_GET['id']."'";
$resultado = mysqli_query($connection, $sql);
$resultado1 = mysqli_query($connection, $sql1);


$coluna = mysqli_fetch_array($resultado);
echo  "<h1 style =text-align:center> Turmas do curso de ".$coluna["nome"]."</h1>" ;


if (mysqli_num_rows($resultado1) > 0) {
  while($coluna = mysqli_fetch_array($resultado1)) {
    echo "<div style=background-color:#03FFF2>";
	echo "<div style = background-color=#C0C0C0; text-align = center><b>Nome da turma:</b> " . $coluna["nome"]."</div>";
	echo "<div style = background-color=#C0C0C0; text-align = center><p> <b>Id</b>: " . $coluna["id"]."</p></div>";
	echo "<button sytyle = background-color =  #3000F6;text-align = center > Detalhes</button></div>";
  }
} else {
  echo "Existem 0 turmas para esse curso";
}


mysqli_close($connection);
?>


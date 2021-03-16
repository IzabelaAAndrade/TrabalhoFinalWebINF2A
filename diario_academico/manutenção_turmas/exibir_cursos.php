<!DOCTYPE html>
<html>
<head>
<title> Exibir cursos </title>
</head>
<body>
<h2>Pequisa de turmas</h2>
<form action = "search_turmas.php" method="post" >
   <label>Insira o nome ou o id da turma</label>
   <input type="text" name="busca" placeholder="Buscar">
   <button type="submit" name="submit_button" id = "botão1" style = "width:250px;">Buscar </button>
   <br>
</form>
</body>


<?php


include "conect_bd.php";
global $connection;

echo "<h2>Cursos</h2>";
$sql = "SELECT id, nome FROM cursos";
   

$resultado = mysqli_query($connection, $sql);
$num_colunas = mysqli_num_rows($resultado);

if($num_colunas > 0){
	while($coluna = mysqli_fetch_array($resultado)){
		echo  "<a href=exibir_turmas.php?id=".$coluna["id"].">".$coluna["nome"]."</a><br>" ;
	}
}else{
	echo " Não há nenhum curso!";
}

mysqli_close($connection);
?>


</body>
</html>


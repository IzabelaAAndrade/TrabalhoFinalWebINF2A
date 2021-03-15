<!DOCTYPE html>
<html>
<head>
<title>Pesquisa turmas </title> 

</head>
<body>

<h1>Resultados da pesquisa</h1>

<div>

<?php
include 'conect_bd.php';
if(isset($_POST['submit_button'])){
	$search = $_POST['busca'];
	$sql = "SELECT * FROM turmas WHERE id LIKE '%$search%' OR nome LIKE '%$search%'";
	$resultado = mysqli_query($connection, $sql);
	$queryResultado = mysqli_num_rows($resultado);
	echo " Existem " . $queryResultado . " resultados para sua pesquisa.";
	if($queryResultado > 0){
		while($coluna = mysqli_fetch_array($resultado)) {
			echo "<div style=background-color:#03FFF2>";
			echo "<div style = background-color=#C0C0C0; text-align = center><b>Nome da turma:</b> " . $coluna["nome"]."</div>";
			echo "<div style = background-color=#C0C0C0; text-align = center><p> <b>Id</b>: " . $coluna["id"]."</p></div>";
			echo "<button sytyle = background-color =  #3000F6;text-align = center > Detalhes</button></div><br>";
		}
	} else{
		echo "";
	}
	
}else{
	echo "";
}

?>

</div>
</body>
</html>

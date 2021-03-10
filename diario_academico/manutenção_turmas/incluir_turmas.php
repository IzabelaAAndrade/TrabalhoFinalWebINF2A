
<head>
<title>Incluir turmas</title>
</head>


<?php

include 'conect_bd.php';


$name = $_POST['nome'];
$id = $_POST['id'];
$id_curso = $_POST['id_curso'];


$sql = "INSERT INTO turmas (id, id_cursos, nome) VALUES ('$id', '$id_curso', '$name');";

if (mysqli_query($connection, $sql)){
	header("Location: ../criar_turmas.html?signup=sucess");

}else{
	header("Location: ../criar_turmas.html?signup=error");
}

mysqli_close($connection);


?>


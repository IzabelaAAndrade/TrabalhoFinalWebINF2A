<?php
include 'conect_bd.php';


	$id_curso = filter_input(INPUT_POST, 'idCurso', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome_turma = filter_input(INPUT_POST, 'nomeTurma', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_turma = filter_input(INPUT_POST, 'idTurma', FILTER_SANITIZE_SPECIAL_CHARS);


	$sql = "INSERT INTO turmas (id, id_cursos, nome) VALUES ('$id_turma', '$id_curso', '$nome_turma');";
    $query = "SELECT id, id_cursos, nome FROM turmas WHERE id = '$id_turma' AND nome = '$nome_turma' AND id_curso = 'id_curso' ";
  
	$result = mysqli_query($connection, $query);


    if($result!=false){                
        $returnStatus = true;
		header("<a href=exibir_turmas.php?id=".$id_curso."?sucess></a>");
    }else{
        $returnStatus = false;
		header("<a href=exibir_turmas.php?id=".$id_curso."?sucess></a>");
    }  

mysqli_close($connection);

?>

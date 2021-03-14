<?php
    /*CONEXÃO COM BANCO DE DADOS*/
    include "conect_bd.php";
    global $connection;
    
    $id_curso = filter_input(INPUT_POST, 'idCurso', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_curso = intval($id_curso,10);
    $nome_turma = filter_input(INPUT_POST, 'nomeTurma', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_turma = filter_input(INPUT_POST, 'idTurma', FILTER_SANITIZE_SPECIAL_CHARS);
    
    if(!empty($id_curso) && empty($nome_turma)){
        $query = "UPDATE `turmas` SET `id_cursos` = $id_curso WHERE `id`=$id_turma";
        $result = mysqli_query($connection, $query);

    }else if(empty($id_curso) && !empty($nome_turma)){
        $query = "UPDATE `turmas` SET `nome` = '$nome_turma' WHERE `id`=$id_turma";
        $result = mysqli_query($connection, $query);

    }else if(!empty($id_curso) && !empty($nome_turma)){
        $query = "UPDATE `turmas` SET `id_cursos` = $id_curso,`nome` = '$nome_turma' WHERE `id`=$id_turma";
        $result = mysqli_query($connection, $query);
    }
    
    if($result!=false){                
        $returnStatus = true;
    }else{
        $returnStatus = false;
    }  
    echo $returnStatus;
        
    mysqli_close($connection);
?>
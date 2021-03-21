<?php

    require("conexao.php");
    
    $id_depto = $_POST['id_departamento'];
    $nome = $_POST['nome'];
    $horas_total = $_POST['total_horas'];
    $modalidade = $_POST['modalidade'];

    $query = "INSERT INTO cursos (id_depto, nome, horas_total, modalidade) VALUES ($id_depto,'$nome',$horas_total,'$modalidade')";
    $resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
    if($resultado!=null){
        echo "<div class='alert alert-success' role='alert'>Sucesso! Curso $nome criado.</div>";
    }

?>
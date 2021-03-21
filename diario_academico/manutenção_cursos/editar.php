<?php
    require("conexao.php");
    $id = $_POST['id'];
    $id_depto = $_POST['id_departamento'];
    $nome = $_POST['nome'];
    $horas_total = $_POST['total_horas'];
    $modalidade = $_POST['modalidade'];
    $query = "UPDATE cursos SET id_depto=$id_depto, nome='".$nome."', horas_total=$horas_total, modalidade='".$modalidade."' WHERE id=$id";
    $resultado = mysqli_query($conexao,$query) or die('Erro de conexão.');
    if($resultado!=null){
        echo "Salvo com sucesso!";
    }
?>
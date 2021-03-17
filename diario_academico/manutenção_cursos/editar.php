<?php
    require("conexao.php");
    $query = "SELECT * FROM cursos WHERE id =".$_POST['id'];
    $resultado = mysqli_query($conexao,$query) or die('Erro de conexão.');
    $row = mysqli_fetch_array($resultado);
?>
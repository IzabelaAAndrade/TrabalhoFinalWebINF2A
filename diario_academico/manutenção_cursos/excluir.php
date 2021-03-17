<?php
    require("conexao.php");
    $query = "DELETE FROM cursos WHERE id =".$_POST['id'];
    $resultado = mysqli_query($conexao,$query) or die('Erro ao deletar');
    if($resultado!=null){
        echo "Excluído com sucesso!";
    }
?>
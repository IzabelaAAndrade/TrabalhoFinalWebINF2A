<?php
    require("conexao.php");
    $query = "SELECT * FROM turmas WHERE id_cursos =".$_POST['id'];
    $resultado = mysqli_query($conexao,$query) or die('Erro de conexão');
    $linhas=mysqli_num_rows($resultado);
    if($linhas>0){
        die("Erro! O curso selecionado não pode ser excluído pois existem $linhas turmas do mesmo em aberto.");
    } else {
        $query = "DELETE FROM cursos WHERE id =".$_POST['id'];
        $resultado = mysqli_query($conexao,$query) or die('Erro ao deletar');
        if($resultado!=null){
            die("Excluído com sucesso!");
        }
    }
?>
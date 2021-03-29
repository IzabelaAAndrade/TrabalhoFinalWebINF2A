<?php
    include '../lib/conexao.php';

    
    $id = htmlspecialchars($_GET["idTurma"]);

    if(mysqli_num_rows(mysqli_query($conexao, "SELECT id_turmas FROM disciplinas WHERE id_turmas=$id"))>0){
        $return = "A turma tem disciplinas ainda utilizadas. Não é possível deletar a turma.";
    }else{
        $result = mysqli_query($conexao, "DELETE FROM `turmas` WHERE id=$id");

        if($result!=false){
            $return = "Turma deletada com sucesso.";
        }else{
            $return = "Erro ao deletar turma.";
        }
    }
    echo $return;

    mysqli_close($conexao);
?>
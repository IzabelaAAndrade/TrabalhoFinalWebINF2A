<?php
    /*CONEXÃO COM BANCO DE DADOS*/
    include '../lib/conexao.php';
    
    $id_curso = filter_input(INPUT_POST, 'idCurso', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_curso = intval($id_curso,10);
    $nome_turma = filter_input(INPUT_POST, 'nomeTurma', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_turma = filter_input(INPUT_POST, 'idTurma', FILTER_SANITIZE_SPECIAL_CHARS);
    global $returnStatus;
    /*Confere se o nome já está sendo utilizado*/ 
    if(mysqli_num_rows(mysqli_query($conexao, "SELECT nome FROM turmas WHERE nome='$nome_turma'"))==0){
        $bool = true;
        
    }else{
        $bool = false;
    }

    /*Confere se o curso existe*/ 
    if(mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM cursos WHERE id=$id_curso"))!=0){
        $bool1 = true;

    }else{
        $bool1 = false;
    }

    if($bool || $bool1){
        if(!empty($id_curso) && empty($nome_turma) && $bool1){/*Se o nome está vazio*/
            $query = "UPDATE `turmas` SET `id_cursos` = $id_curso WHERE `id`=$id_turma";
            $result = mysqli_query($conexao, $query);
            
            if($result!=false){                
                $returnStatus = "Alterações concluídas com sucesso.";
            }else{
                $returnStatus = "Erro ao concluir alterações.";
            }

        }else if(empty($id_curso) && !empty($nome_turma) && $bool){/*Se o curso está vazio*/
            $query = "UPDATE `turmas` SET `nome` = '$nome_turma' WHERE `id`=$id_turma";
            $result = mysqli_query($conexao, $query);

            if($result!=false){                
                $returnStatus = "Alterações concluídas com sucesso.";
            }else{
                $returnStatus = "Erro ao concluir alterações.";
            }
    
        }else if(!empty($id_curso) && !empty($nome_turma) && $bool && $bool1){/*Se os dois não estão vazios*/
            $query = "UPDATE `turmas` SET `id_cursos` = $id_curso,`nome` = '$nome_turma' WHERE `id`=$id_turma";
            $result = mysqli_query($conexao, $query);

            if($result!=false){                
                $returnStatus = "Alterações concluídas com sucesso.";
            }else{
                $returnStatus = "Erro ao concluir alterações.";
            }
        }
        
    }else{
        $returnStatus = "";
            if(!$bool1 && !empty($id_curso)){
                $returnStatus .= "O ID inserido não pertence a nenhum curso.";
            }
            if(!$bool && !empty($nome_turma)){
                $returnStatus .= "Este nome já está sendo utilizado.";
            }
    }
      
    
    echo $returnStatus;
        
    mysqli_close($conexao);
?>
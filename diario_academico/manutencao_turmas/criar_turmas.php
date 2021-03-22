<?php
    include 'conexao.php';
    
    if(!empty($_POST['nomeTurma']) && !empty($_POST['idCurso'])){
        $num_turmas = mysqli_query($connection,"SELECT id FROM turmas WHERE 1");
        $id_turma = mysqli_num_rows($num_turmas);
        $id_turma++;

        $nome_turma = filter_input(INPUT_POST, 'nomeTurma', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_input(INPUT_POST, 'idCurso', FILTER_SANITIZE_SPECIAL_CHARS);

        /*Confere se o nome já está sendo utilizado*/ 
        if(mysqli_num_rows(mysqli_query($connection, "SELECT nome FROM turmas WHERE nome='$nome_turma'"))==0){
            $bool = true;
            
        }else{
            $bool = false;
        }

        /*Confere se o curso existe*/ 
        if(mysqli_num_rows(mysqli_query($connection, "SELECT id FROM cursos WHERE id=$id_curso"))!=0){
            $bool1 = true;

        }else{
            $bool1 = false;
        }

        if($bool && $bool1){
            $sql = "INSERT INTO turmas (id, id_cursos, nome) VALUES ($id_turma, $id_curso, '$nome_turma')";    
            $result = mysqli_query($connection, $sql);

            if($result!=false){                
                $return = "Turma criada com sucesso.";
            }else{
                $return = "Erro ao criar turma.";
            }        
        }else{
            $return = "";
            if(!$bool1){
                $return .= "O ID inserido não pertence a nenhum curso.";
            }
            if(!$bool){
                $return .= "Este nome já está sendo utilizado.";
            }
        }
        echo $return;
        
    }else{
        echo "Preencha todos os dados.";
    }
        
    mysqli_close($connection);
?>

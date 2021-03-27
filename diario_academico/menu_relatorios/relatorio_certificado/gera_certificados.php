<?php

    require('conexao.php');
    $id_aluno = $_POST["id_aluno"];
    $query = "SELECT * FROM alunos WHERE id=$id_aluno";
    $resultado_aluno = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
    $row_aluno = mysqli_fetch_array($resultado_aluno);
    $nome_aluno = $row_aluno["nome"];

    echo "<div class='divTabela' id='caixa'>
            <h2 class='texto-certificado texto-colorido'>CERTIFICADO</h2>
            <p class='texto-certificado'>Certificamos para os devidos fins que $nome_aluno, ID $id_aluno, cursou com êxito as seguintes disciplinas nesta instituição de ensino: </p>";
    echo "<table id='tabela_disciplinas_cursadas'>
            <thead>
                <th>Matrícula</th>
                <th>Disciplina</th>
                <th>Carga Horária</th>
                <th>Nota Obtida</th>
                <th>Faltas</th>
            </thead>";
    
    $query = "SELECT * FROM matriculas WHERE id_alunos=$id_aluno";
    $resultado_matriculas = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");

    while($row_matriculas = mysqli_fetch_array($resultado_matriculas)){
        $id_matricula = $row_matriculas['id'];
        $id_disciplina = $row_matriculas['id_disciplinas'];
        echo "<tr><td>$id_matricula</td>";
        
        $query = "SELECT * FROM disciplinas WHERE id=$id_disciplina";
        $resultado_disciplinas = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
        $row_disciplinas = mysqli_fetch_array($resultado_disciplinas);
        $nome_disciplina = $row_disciplinas['nome'];
        $carga_horaria = $row_disciplinas['carga_horaria_min'];
        echo "<td>$nome_disciplina</td>";
        echo "<td>$carga_horaria</td>";

        $query = "SELECT * FROM diario WHERE id_matriculas=$id_matricula";
        $resultado_diario = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
        $row_diario = mysqli_fetch_array($resultado_diario);
        $nota = $row_diario['nota'];
        $faltas = $row_diario['faltas'];
        echo "<td>$nota</td>";
        echo "<td>$faltas</td></tr>";

    }

    echo "</table>
    <div id='imprimir' class='solid btn imprimir'>Imprimir</div></div> 
    </div>";


?>
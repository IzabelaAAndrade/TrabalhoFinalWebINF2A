<?php

require("conexao.php");

$id_aluno = $_POST["id_aluno"];

$query = "SELECT * FROM alunos WHERE id = $id_aluno";
$resultado = mysqli_query($conexao, $query);
$cont = mysqli_num_rows($resultado);

if($cont>0){

    $query = "SELECT * FROM emprestimos WHERE id_alunos = $id_aluno";
    $resultado = mysqli_query($conexao, $query);
    $cont = mysqli_num_rows($resultado);

    if($cont>0){

        echo "<table class='table table-hover' id='listagem'>   
        <thead>
            <tr>
                <th>ID</th>
                <th>ID do Acervo</th>
                <th>Data do Empréstimo</th>
                <th>Data de Devolução (Prevista)</th>
                <th>Data de Devolução</th>
                <th>Multa</th>
                <th></th>
            </tr>
        </thead>
        <tbody>";
        while($row = mysqli_fetch_assoc($resultado)){
            echo "<tr>
                    <td>".$row['Id']."</td>         
                    <td>".$row['id_acervo']."</td>           
                    <td>".$row['data_emprestimo']."</td>           
                    <td>".$row['data_prev_devol']."</td>            
                    <td>".$row['data_devolucao']."</td>
                    <td>".$row['multa']."</td>  
                    <td class='actions text-right'> <a class='btn btn-sm btn-danger btnRemover' data-toggle='modal' data-target='#delete-modal' data-customer=''><i class='fa fa-trash'></i> Devolver</a></td>
                </tr>";
        }


    } else {
        echo "Nenhum empréstimo.";
    }

} else {
    echo "Não existe aluno cadastrado com o ID informado.";
}




?>
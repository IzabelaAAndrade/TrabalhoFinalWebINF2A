<?php

require("conexao.php");

$query = "SELECT * FROM alunos";
$resultado_alunos = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");

echo "<div class='divTabela'><table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade de matrículas</th>
            <th>Quantidade de reprovações</th>
            <th>Situação</th>
        </thead>";

while ($row_alunos = mysqli_fetch_array($resultado_alunos)){
    $id_aluno = $row_alunos["id"];
    $nome_aluno = $row_alunos["nome"];
    $query = "SELECT * FROM matriculas WHERE ativo='S' AND id_alunos=$id_aluno";
    $resultado_matriculas = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
    $num_matriculas = mysqli_num_rows($resultado_matriculas);

    $array_matriculas_notas = array();
    while($row_matriculas = mysqli_fetch_array($resultado_matriculas)){
        $id_matricula = $row_matriculas["id"];
        $query = "SELECT * FROM diario WHERE id_matriculas=$id_matricula";
        $resultado_diario = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
        $row_diario = mysqli_fetch_array($resultado_diario);
        $nota = $row_diario["nota"];
        $array_matriculas_notas[$id_matricula] = $row_diario["nota"];
    }

    $num_reprovacoes = 0;

    foreach ($array_matriculas_notas as $matricula => $nota) {
        if($nota<60){
            $num_reprovacoes = $num_reprovacoes+1;
        }
    }

    echo "<tr>
            <td>$id_aluno</td>
            <td>$nome_aluno</td>
            <td>$num_matriculas</td>
            <td>$num_reprovacoes</td>";
    if($num_reprovacoes>0 && $num_matriculas>0){
        echo "<td>Reprovado</td>
            <td>--</td>";
    } else {
        echo "<td>Aprovado</td>
            <td><a class='ver'><div class='btnTabela'>Ver certificado</div></a></td>";
    }
    echo "</tr>";

}

echo "<div>
</table>";

?>
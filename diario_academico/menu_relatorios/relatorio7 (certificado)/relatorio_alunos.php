<?php
$cpf = $_GET["cpf"];
$etapa = $_GET["etapa"];
$mysqli = new mysqli("localhost", "root","123456", "trabalho_diario_academico");
$aluno = getDados("SELECT * FROM alunos WHERE id=$cpf")[0];
$matriculas = getDados("SELECT * FROM matriculas WHERE id_alunos=".$aluno['id']);
foreach($matriculas as $matricula){
    $conteudos[] = getDados("SELECT * FROM conteudos WHERE id_etapas=$etapa AND id_disciplinas=".$matricula["id_disciplinas"])[0];
}
foreach($conteudos as $conteudo){
    $id_conteudo[] = $conteudo["id"];
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Alunos</title>
</head>
<body>
<h1>Relatório de alunos</h1>
<h2>Relatório Aluno <?= $aluno['nome']?></h2>
<h3><?=$etapa?>ª Etapa</h3>
<table>
    <tr>
        <th>Disciplina</th>
        <th>Nota</th>
    </tr>
    <tr>
        <?php
        foreach($matriculas as $matricula){
            $disciplina = getDados("SELECT nome FROM disciplinas WHERE id=".$matricula["id_disciplinas"])[0];
            echo "<td>$disciplina[0]</td>";
            $diario = getDados("SELECT * FROM diario WHERE id_matriculas=".$matricula["id"]." AND id_conteudos IN (".implode(",",$id_conteudo).")")[0];
            echo "<td>$diario[4]</td>";
        }
        ?>
    </tr>
</table>
</body>
</html>
<?php
function getDados(String $sql): array
{
    global $mysqli;
    $result = $mysqli->query($sql);
    return mysqli_fetch_all($result, MYSQLI_BOTH);
}

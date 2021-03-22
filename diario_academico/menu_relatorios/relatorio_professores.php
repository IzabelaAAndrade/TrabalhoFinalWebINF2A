<?php
//Relação de professores por seleção de cursos, listando suas respectivas disciplinas e horas de trabalho
$nome_curso = "inf";
$mysqli = new mysqli("localhost", "root", "123456", "trabalho_diario_academico");
$id_curso = getDados("SELECT id FROM cursos WHERE nome='$nome_curso'")[0][0];
$turmas = getDados("SELECT id FROM turmas WHERE id_cursos='$id_curso'");
foreach($turmas as $turma){
    $ids_turmas[] = $turma[0];
}
unset($turmas);
$disciplinas = getDados("SELECT * FROM disciplinas WHERE id_turmas IN (".implode(",",$ids_turmas).")");
foreach($disciplinas as $disciplina){
    $ids_disciplinas[] = $disciplina[0];
}
unset($disciplinas);
$prof_disciplinas = getDados("SELECT * FROM prof_disciplinas WHERE `Id-Disciplinas` IN (".implode(",",$ids_disciplinas).")");
?>
    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Relatório de Alunos</title>
    </head>
    <body>
    <h1>Relatório de professores</h1>
    <h2>Curso: <?= $nome_curso ?></h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Disciplina</th>
            <th>Horas de Trabalho</th>
        </tr>
    <?php
    foreach ($prof_disciplinas as $prof_disciplina){
        echo "<tr>";
        $nome = getDados("SELECT nome FROM professores WHERE id=$prof_disciplina[0]")[0][0];
        echo "<td>$nome</td>";
        $disciplina = getDados("SELECT nome FROM disciplinas WHERE id=$prof_disciplina[1]")[0][0];
        echo "<td>$disciplina</td>";
        $carga_h = getDados("SELECT carga_horaria_min FROM disciplinas WHERE id=$prof_disciplina[1]")[0][0];
        echo "<td>$carga_h</td>";
        echo "</tr>";
    }
    ?>
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
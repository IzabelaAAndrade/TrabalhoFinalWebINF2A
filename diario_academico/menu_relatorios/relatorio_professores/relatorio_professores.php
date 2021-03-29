<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu de Relatórios - Relação de Professores</title>
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="stylesheet" href="../css_relatorios/style_inputs_botoes.css">
        <link rel="stylesheet" href="css/style_relatorio_professores.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="../LogoExemploCortado.png" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../../campi/inseriCampi.html">Campi</a></li>
                        <li><a href="../../manutencao_departamentos/departamentos.html">Departamentos</a></li>
                        <li><a href="../../manutenção_cursos/index.html">Cursos</a></li>
                        <li><a href="../../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../../manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../../manutencao_disciplinas/">Disciplinas</a></li>
                        <li><a href="../../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../../manutencao_diarios/php/inserir.php">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../index.html">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/index.html">Certificados</a></li>
                        <li><a href="../relatorio_historico/index.html">Histórico por Aluno e Turma</a></li>
                        <li><a href="../relatorio_alunos/index_relatorio_aluno.html">Relação de Alunos</a></li>
                        <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                        <li><a href="index.html">Relação de Professores</a></li>
                    </ul>
                </li>
                <li><a href="../diario_academico/transferencia_alunos/desliga_interface.php">Transferências</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
<?php
//Relação de professores por seleção de cursos, listando suas respectivas disciplinas e horas de trabalho
$nome_curso = $_GET["curso"];
$dados = false;
        
// $mysqli = new mysqli("localhost", "root", "123456", "academico");
include_once '../../lib/conexao.php';
        
$id_curso = getDados("SELECT id FROM cursos WHERE nome='$nome_curso'")[0][0];
if($id_curso != null){
    $dados = true;
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
}
?>
    <div id="cabecalho">
        <p><a href="../">Menu de Relatórios</a> > <a href="index.html">Relação de Professores</a></p>
        <h1 class="principal">Relação de Professores</h1>
    </div>
    <?php
    if ($dados === true){
        dadoscorretos();
    }
    else{
        dadosincorretos();
        print_r($prof_disciplinas);
    }
    ?>
    <script src="../impressao_relatorios.js"></script>
    </body>
    </html>
<?php
function getDados(String $sql): ?array
{
    global $conxexao;
    $result = mysqli_query($conxexao,$sql);
    if($result == false){return null;}
    return mysqli_fetch_all($result, MYSQLI_BOTH);
}
function dadoscorretos(){
    global $prof_disciplinas;
    echo '
    <div class="divTabela">
    <h2>Relação de Professores - Curso: <?= $nome_curso ?></h2>
    <p id="nenhumResultado"></p>
        <table>
            <thead>
                <th>Nome</th>
                <th>Disciplina</th>
                <th>Horas de Trabalho</th>
            </thead>';
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
    echo'
    </table>
        <div id="imprimir" class="imprimir">Imprimir</div>
    </div>';
}
function dadosincorretos(){
    echo '<p id"nenhumResultado">Nenhum resultado para os dados inseridos.</p>';
}

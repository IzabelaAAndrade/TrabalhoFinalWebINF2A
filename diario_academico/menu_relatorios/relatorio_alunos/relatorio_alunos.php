<?php
$cpf = $_GET["cpf"];
$etapa = $_GET["etapa"];

// $mysqli = new mysqli("localhost", "root","123456", "academico");
include_once '../../lib/conexao.php';

$aluno = getDados("SELECT * FROM alunos WHERE id=$cpf")[0];
if($aluno == null){dadosincorretos();}
$matriculas = getDados("SELECT * FROM matriculas WHERE id_alunos=".$aluno['id']);
foreach($matriculas as $matricula){
    $conteudos[] = getDados("SELECT * FROM conteudos WHERE id_etapas=$etapa AND id_disciplinas=".$matricula["id_disciplinas"])[0];
}
foreach($conteudos as $conteudo){
    $id_conteudo[] = $conteudo["id"];
}
?>
<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção Acervo</title>
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="stylesheet" href="css/style_relatorio_alunos.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="img/LogoExemploCortado.png" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header> 
        <nav>
            <ul class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../diario_academico/campi/inseriCampi.html">Campi</a></li>
                        <li><a href="../diario_academico/manutencao_departamentos/departamentos.html">Departamentos</a></li>
                        <li><a href="../diario_academico/manutenção_cursos/index.html">Cursos</a></li>
                        <li><a href="../manutencao_turmas/manutencao_cursos.php">Turmas</a></li>
                        <li><a href="../diario_academico/manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../diario_academico/manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../diario_academico/manutencao_disciplinas/">Disciplinas</a></li>
                        <li><a href="../diario_academico/manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../diario_academico/manutencao_diarios/php/inserir.php">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../index.html">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/certificados.html">Certificados</a></li>
                        <li><a href="../relatorio_historico/index.html">Histórico por Aluno e Turma</a></li>
                        <li><a href="index_relatorio_aluno.html">Relação de Alunos</a></li>
                        <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                        <li><a href="../relatorio_professores/index.html">Relação de Professores</a></li>
                    </ul>
                </li>
                <li><a href="../diario_academico/transferencia_alunos/desliga_interface.php">Transferências</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
    <main>
        <div id="cabecalho">
            <p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index_relatorio_aluno.html">Relação de Alunos</a></p>
            <h1 class="principal">Relação de Alunos</h1>
        </div>
        <div class="divTabela">
            <h2>ALUNO: <?= $aluno['nome']?></h2>
            <table>
                <caption><?=$etapa?>ª Etapa</caption>
                <thead>
                    <th>Disciplina</th>
                    <th>Nota</th>
                </thead>
                    <?php
                    foreach($matriculas as $matricula){
                        echo "<tr>";
                        $disciplina = getDados("SELECT nome FROM disciplinas WHERE id=".$matricula["id_disciplinas"])[0];
                        echo "<td>$disciplina[0]</td>";
                        $diario = getDados("SELECT * FROM diario WHERE id_matriculas=".$matricula["id"]." AND id_conteudos IN (".implode(",",$id_conteudo).")")[0];
                        echo "<td>$diario[4]</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
            <div id='imprimir' class='solid btn imprimir'>Imprimir</div>
        </div>
    </main>
    
</body>
<script src="../impressao_relatorios.js"></script>
</html>
<?php
function getDados(String $sql): ?array
{
    global $conxexao;
    $result = mysqli_query($conxexao,$sql);
    if($result == false){return null;}
    return mysqli_fetch_all($result, MYSQLI_BOTH);
}
function dadosincorretos(){
    echo'
<!DOCTYPE html>
<html lang=\"pt\">
	<head>
		<meta charset="UTF-8">
        	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        	<title>Manutenção Acervo</title>
        	<link rel="stylesheet" href="../css_relatorios/index.css">
        	<link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        	<link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        	<link rel="stylesheet" href="css/style_relatorio_alunos.css">
        	<link rel="preconnect" href="https://fonts.gstatic.com">
        	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	</head>
	<body>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção Acervo</title>
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="stylesheet" href="css/style_relatorio_alunos.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="img/LogoExemploCortado.png" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header> 
        <nav>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../diario_academico/campi/inseriCampi.html">Campi</a></li>
                        <li><a href="../diario_academico/manutencao_departamentos/departamentos.html">Departamentos</a></li>
                        <li><a href="../diario_academico/manutenção_cursos/index.html">Cursos</a></li>
                        <li><a href="../manutencao_turmas/manutencao_cursos.php">Turmas</a></li>
                        <li><a href="../diario_academico/manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../diario_academico/manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../diario_academico/manutencao_disciplinas/">Disciplinas</a></li>
                        <li><a href="../diario_academico/manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../diario_academico/manutencao_diarios/php/inserir.php">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../index.html">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/certificados.html">Certificados</a></li>
                        <li><a href="">Histórico por Aluno e Turma</a></li>
                        <li><a href="../relatorio_relacao_conteudos/index.php">Relação de Conteúdos</a></li>
                        <li><a href="index_relatorio_aluno.html">Relação de Alunos</a></li>
                        
                    </ul>
                </li>
                <li><a href="../diario_academico/transferencia_alunos/desliga_interface.php">Transferências</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
    	<main>
		<div id="cabecalho">
            		<p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index_relatorio_aluno.html">Relação de Alunos</a></p>
            		<h1 class="principal">Relação de Alunos</h1>
        	</div>
		<p id"nenhumResultado">Nenhum resultado para os dados inseridos.</p>
	</main>
    <footer>
            <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
	</body>
</html>';
    exit();
}

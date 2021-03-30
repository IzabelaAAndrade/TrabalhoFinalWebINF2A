<?php
@session_start();
include '../../../sistema_login/verifica_login.php';
$cpf = $_GET["cpf"];
$etapa = $_GET["etapa"];

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
        <title>Menu de Relatórios - Relação de Alunos | SIDA</title>
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="stylesheet" href="css/style_relatorio_alunos.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="../sidaLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
            <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
            </div>
            </div>
        </header> 
        <nav>
        <ul class="menu">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../sobre.php">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../../campi/campi.php">Campi</a></li>
                    <li><a href="../../manutencao_departamentos/index.php">Departamentos</a></li>
                    <li><a href="../../manutencao_cursos/index.php">Cursos</a></li>
                    <li><a href="../../manutencao_turmas/index.php">Turmas</a></li>
                    <li><a href="../../manutencao_alunos/index.php">Alunos</a></li>
                    <li><a href="../../manutencao_professores/index.php">Professores</a></li>
                    <li><a href="../../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                    <li><a href="../../manutencao_etapas/index.php">Etapas</a></li>
                    <li><a href="../../manutencao_diarios/index.php">Diários</a></li>
                </ul>
            </li>
            <li><a href="../index.php">Relatórios</a>
                <ul class="sub_menu">
                    <li><a href="../relatorio_certificado/index.php">Certificados</a></li>
                    <li><a href="../relatorio_historico/index.php">Histórico por Aluno e Turma</a></li>
                    <li><a href="index_relatorio_aluno.php">Relação de Alunos</a></li>
                    <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                    <li><a href="../relatorio_professores/index.php">Relação de Professores</a></li> 
                </ul>
            </li>
            <li><a href="../../transferencia_alunos/index.php">Transferências</a></li>
        </ul>
        </nav>
    <main>
        <div id="cabecalho">
            <p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index_relatorio_aluno.php">Relação de Alunos</a></p>
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
    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="../impressao_relatorios.js"></script>
    
</body>
</html>
<?php
function getDados(String $sql): ?array
{
    global $conexao;
    $result = mysqli_query($conexao, $sql);
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
        	<title>Menu de Relatórios - Relação de Alunos</title>
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
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../../sobre.html">Sobre</a></li>
        <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../../campi/campi.php">Campi</a></li>
                    <li><a href="../../manutencao_departamentos/">Departamentos</a></li>
                    <li><a href="../../manutencao_cursos/index.php">Cursos</a></li>
                    <li><a href="../../manutencao_turmas/index.php">Turmas</a></li>
                    <li><a href="../../manutencao_alunos/index.php">Alunos</a></li>
                    <li><a href="../../manutencao_professores/index.html">Professores</a></li>
                    <li><a href="../../manutencao_disciplinas/">Disciplinas</a></li>
                    <li><a href="../../manutencao_etapas/index.php">Etapas</a></li>
                    <li><a href="../../manutencao_diarios/index.html">Diários</a></li>
                </ul>
                </li>
                <li><a href="../index.html">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/index.html">Certificados</a></li>
                        <li><a href="../relatorio_historico/index.html">Histórico por Aluno e Turma</a></li>
                        <li><a href="index_relatorio_aluno.html">Relação de Alunos</a></li>
                        <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                        <li><a href="../relatorio_professores/index.html">Relação de Professores</a></li> 
                    </ul>
                </li>
                <li><a href="../../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
        </nav>
    	<main>
		<div id="cabecalho">
            		<p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index_relatorio_aluno.html">Relação de Alunos</a></p>
            		<h1 class="principal">Relação de Alunos</h1>
        	</div>
		<p id="nenhumResultado">Nenhum resultado para os dados inseridos.</p>
	</main>
    <footer>
            <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
	</body>
</html>';
    exit();
}

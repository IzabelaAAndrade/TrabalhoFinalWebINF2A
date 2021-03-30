<?php
    @session_start();
   include '../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção Acervo</title>
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="css/style_certificados.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
    <title>Menu de Relatórios - Certificados | SIDA</title>
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
                    <li><a href="../../manutencao_departamentos/">Departamentos</a></li>
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
                    <li><a href="index.php">Certificados</a></li>
                    <li><a href="../relatorio_historico/index.php">Histórico por Aluno e Turma</a></li>
                    <li><a href="../relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                    <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                    <li><a href="../relatorio_professores/index.php">Relação de Professores</a></li> 
                </ul>
            </li>
            <li><a href="../../transferencia_alunos/index.php">Transferências</a></li>
        </ul>
    </nav>
    <main>
        <div id="cabecalho">
            <p><a href="../">Menu de Relatórios</a> > <a href="index.php">Certificados</a></p>
            <h1 class="principal">Certificados</h1>
        </div>

        <div id="main">
            <div id="opcoes">
            </div>
            
            <div id="middle">
                <div id="filtro" class="solid hidden">
                    <div id="filtro_container">
                    </div>
                    <div id="actions">
                        <div id="reset" class="solid btn">
                            Reset
                        </div>
                        <div id="aplicar" class="solid btn">
                            Aplicar
                        </div>
                    </div>
                </div>
            
                <div id="resultado" class="solid">
                    <div id="resultado_container">
                    </div>
                    <div id="resultado_actions">
                    </div>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>
</body>
</html>

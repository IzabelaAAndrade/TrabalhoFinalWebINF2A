<!--
  Página inicial - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Mayara Mendes
-->
<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção de alunos</title>
    <link rel="stylesheet" href="CSSs/geral_academico.css">
    <link rel="stylesheet" href="CSSs/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="CSSs/img/logo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo $_SESSION['nome_user']; ?></h2>
                <h2 id="sair"><a id="sair" href="../../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="../../sistema_login/index.php">Início</a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../sobre.php">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../campi/campi.php">Campi</a></li>
                    <li><a href="../manutencao_departamentos/index.php">Departamentos</a></li>
                    <li><a href="../manutencao_cursos/index.php">Cursos</a></li>
                    <li><a href="../manutencao_turmas/index.php">Turmas</a></li>
                    <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
                    <li><a href="../manutencao_professores/">Professores</a></li>
                    <li><a href="../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                    <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
                    <li><a href="../manutencao_diarios/index.php">Diários</a></li>
                </ul>
            </li>
            <li><a href="../menu_relatorios/index.php">Relatórios</a>
                <ul class="sub_menu">
                    <li><a href="../menu_relatorios/relatorio_certificado/index.php">Certificados</a></li>
                    <li><a href="../menu_relatorios/relatorio_historico/index.php">Histórico por Aluno e Turma</a></li>
                    <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                    <li><a href="../menu_relatorios/relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                    <li><a href="../menu_relatorios/relatorio_professores/index.php">Relação de Professores</a></li>
                </ul>
            </li>
            </li>
            <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
        </ul>
    </nav>
    <main>
        <h3 class="sub">Bem-Vindo(a) à</h3>
        <h1 class="principal">Manutenção de alunos</h1>
        <p class="descricao">Deseja inserir, alterar ou excluir alunos? Para isso basta selecionar uma das opções
            abaixo!</p>

        <fieldset id=fieldset>
            <legend>Selecione ação deseja realizar</legend>

            <form action="./index.php" method="post" enctype="multipart/form-data">
                <select class="caixa-seleção" name="link">
                    <option value="formularios/form_inclui_alunos.php">Inserir</option>
                    <option value="formularios/altera/form_confere_dados.php">Alterar</option>
                    <option value="formularios/form_deleta_alunos.php">Excluir</option>
                </select>
                <input class="botao" type="submit" value="enviar">
            </form>
            <?php
            error_reporting(0);
            $link = $_POST['link'];
            header("Location: $link");
            ?>
        </fieldset>

        <?php
        if (isset($_SESSION['insere_true'])) {
            echo '<p id="sucesso" style="margin-top: 0px;">' . $_SESSION['insere_true'] . '</p>';
            unset($_SESSION['insere_true']);
        }
        if (isset($_SESSION['altera_true'])) {
            echo '<p id="sucesso" style="margin-top: 0px;">' . $_SESSION['altera_true'] . '</p>';
            unset($_SESSION['altera_true']);
        }
        if (isset($_SESSION['deleta_true'])) {
            echo '<p id="sucesso" style="margin-top: 0px;">' . $_SESSION['deleta_true'] . '</p>';
            unset($_SESSION['deleta_true']);
        }
        if (isset($_SESSION['insere_aviso'])) {
            echo '<p id="aviso" style="margin-top: 0px;">' . $_SESSION['insere_aviso'] . '</p>';
            unset($_SESSION['insere_aviso']);
        }
        ?>

    </main>
    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
</body>

</html>
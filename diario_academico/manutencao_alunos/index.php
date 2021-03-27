<!--
  Página inicial - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Mayara Mendes
-->
<?php
session_start();
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
        <img src="CSSs/img/LogoExemploCortado.png" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../../../diario_academico/campi/campi.php">Campi</a></li>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Turmas</a></li>
                    <li><a href="#">Alunos</a></li>
                    <li><a href="#">Professores</a></li>
                    <li><a href="#">Disciplinas</a></li>
                    <li><a href="#">Etapas</a></li>
                    <li><a href="#">Diários</a></li>
                </ul>
            </li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="#">Transferências</a></li>
            <li><a href="#">Ajuda</a></li>
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
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG
        </h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
</body>

</html>
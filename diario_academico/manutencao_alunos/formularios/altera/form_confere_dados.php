<!--
  Formulário para alterar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php menu_altera_alunos
  Grupo F - desenvolvido por Tássyla Lima
-->

<?php
session_start();
?>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSSs/style.css">
    <title>Relatórios</title>
</head>

<body>

    <header>
        <img src="../../CSSs/img/LogoExemploCortado.png" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="#">Campi</a></li>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Turmas</a></li>
                    <li><a href="../../index.php">Alunos</a></li>
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
        <h3 class="sub">Bem-Vindo(a) ao</h3>
        <h1 class="principal">Aterar Dados da(o) Aluna(o)</h1>
        <p class="descricao">Para alterar os dados precisamos confirmar sua identidade,<br>por favor digite seu CPF e data de nascimento.</p>
        <div id="ajuste">
            <form novalidate action="../../PHPs/altera/confere_dados.php" method="post">
                <input required class="texto" type="text" id="cpf" name="cpf" placeholder="CPF" data-mask="000.000.000-00">
                <input required class="texto" type="date" name="data_nasc" placeholder="Data de nascimento" min="1900-01-01" max="2010-12-31"></label>

                <?php
                if (isset($_SESSION['erro'])) {
                    echo '<p id="erro">' . $_SESSION['erro'] . '</p>';
                    unset($_SESSION['erro']);
                }
                if (isset($_SESSION['altera_false'])) {
                    echo '<p id="erro">' . $_SESSION['altera_false'] . '</p>';
                    unset($_SESSION['altera_false']);
                }
                ?>

                <div id="divBotoes">
                    <input class="botoes" type="submit" value='Enviar'>
                    <input class="botoes" type="reset" value='Cancelar'><br>
                </div>
            </form>

        </div>
    </main>

    <footer>
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../../JSs/mascara_form.js"></script>
</body>

</html>
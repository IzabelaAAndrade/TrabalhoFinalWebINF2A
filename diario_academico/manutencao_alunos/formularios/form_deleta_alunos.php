<!--
  Formulário para deletar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php deleta_alunos_bd via ajax
  Grupo F - desenvolvido por Mayara Mendes
-->
<?php
@session_start();
include '../../../sistema_login/verifica_login.php';
?>

<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSSs/style.css">
    <title>Manutenção</title>
</head>

<body>

    <header>
        <img src="../CSSs/img/logo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo $_SESSION['nome_user']; ?></h2>
                <h2 id="sair"><a id="sair" href="../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="../../">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../../campi/campi.php">Campi</a></li>
                    <li><a href="../../manutencao_departamentos/">Departamentos</a></li>
                    <li><a href="../../manutencao_cursos/">Cursos</a></li>
                    <li><a href="../../manutencao_turmas/">Turmas</a></li>
                    <li><a href="../">Alunos</a></li>
                    <li><a href="../../manutencao_professores/">Professores</a></li>
                    <li><a href="../../manutencao_disciplinas/">Disciplinas</a></li>
                    <li><a href="../../manutencao_etapas/">Etapas</a></li>
                    <li><a href="../../manutencao_diarios/">Diários</a></li>
                </ul>
            </li>
            <li><a href="../../menu_relatorios/">Relatórios</a></li>
            <li><a href="../../transferencia_alunos/">Transferências</a></li>
        </ul>
    </nav>

    <main>
        <h3 class="sub">Bem-Vindo(a) ao</h3>
        <h1 class="principal">Deletar Dados do(a) Aluno(a)</h1>
        <p class="descricao">Para deletar os dados precisamos confirmar sua identidade,<br>por favor digite seu CPF e data de nascimento.</p>
        <div id="ajuste">
            <form novalidate action="../PHPs/deleta_alunos_bd.php" method="post">
                <input required class="texto" type="text" id="cpf" name="cpf" placeholder="CPF" data-mask="000.000.000-00">
                <input required class="texto" type="date" name="data_nasc" placeholder="Data de nascimento" min="1900-01-01" max="2010-12-31"></label>

                <?php
                if (isset($_SESSION['erro'])) {
                    echo '<p id="erro">' . $_SESSION['erro'] . '</p>';
                    unset($_SESSION['erro']);
                }
                if (isset($_SESSION['deleta_false'])) {
                    echo '<p id="erro">' . $_SESSION['deleta_false'] . '</p>';
                    unset($_SESSION['deleta_false']);
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
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../JSs/mascara_form.js"></script>
</body>

</html>

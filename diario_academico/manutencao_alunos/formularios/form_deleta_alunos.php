<!--
  Formulário para deletar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php deleta_alunos_bd via ajax
  Grupo F - desenvolvido por Mayara Mendes
-->
<?php
session_start();
?>

<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remoção de alunos</title>
  <link rel="stylesheet" href="../CSSs/geral.css">
  <link rel="stylesheet" href="../CSSs/style.css">
  <link rel="stylesheet" href="../CSSs/geral_academico.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../CSSs/incluir.css" />
</head>

<body>
  <header>
    <img src="../CSSs/img/logo.jpg" alt="logo" id="logo">
    <h1 id="titulo">Sistema Diário Acadêmico</h1>
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
    <h3 class="sub">Bem-Vindo(a) a</h3>
    <h1 class="principal">Exclusão de aluno</h1>
    <p class="descricao">Para a exclusão, basta inserir os dados nos campos a seguir:</p>

    <div id="ajuste">
      <form action="../PHPs/deleta_alunos_bd.php" method="post" enctype="multipart/form-data">
        <label><input required placeholder="CPF" required type="text" class="entrada" id="cpf" name="cpf" placeholder="Ex.: 000.000.000-00"></label>
        <label><input required placeholder="Data de nascimento:" required type="date" class="entrada" name="data_nasc" min="1900-01-01" max="2010-12-31"></label>

        <?php
        if (isset($_SESSION['deleta_false'])) {
          echo '<p id="erro">' . $_SESSION['deleta_false'] . '</p>';
          unset($_SESSION['deleta_false']);
        }
        ?>

        <div id="divBotoes">
          <button class="botoes" type="submit" id="enviar">Enviar</button>
          <button class="botoes" id="limpar">Limpar</button>
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
  <script src="../JSs/mascara_form.js"></script>
</body>

</html>
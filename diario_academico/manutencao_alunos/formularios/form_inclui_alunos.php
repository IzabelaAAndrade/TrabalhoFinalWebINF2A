<!--
  Formulário para inserir alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php inclui_alunos_bd via ajax
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
  <title>Inclusão de alunos</title>
  <link rel="stylesheet" href="../CSSs/geral.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSSs/style.css">
  <link rel="stylesheet" type="text/css" href="../CSSs/incluir.css" />
  <link rel="stylesheet" type="text/css" href="../CSSs/menu.css" />
  <link rel="stylesheet" type="text/css" href="../CSSs/header.css" />
</head>

<body>
  <header>
    <div id="logo-titulo">
      <img src="../CSSs/img/LogoExemploCortado.png" alt="logo" id="logo">
      <h1 id="titulo"><strong>Sistema Diário Acadêmico</strong></h1>
    </div>

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
          <li><a href="../index.php">Alunos</a></li>
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
    <h1 class="principal">Incusão de Alunos</h1>
    <p class="descricao">
      <br> Deseja incluir um aluno no Diário Acadêmico? Você está no lugar certo!
      <br>Basta preencher o formulário abaixo.
    </p>
    <h3 class="sub" style="font-size: 1.2em;">Formulário para incluir alunos</h3>

    <?php
    if (isset($_SESSION['insere_false'])) {
      echo '<p id="erro">' . $_SESSION['insere_false'] . '</p>';
      unset($_SESSION['insere_false']);
    }
    ?>

    <div id="ajuste">
      <form action="../PHPs/inclui_alunos_bd.php" method="post" class="contact_form" enctype="multipart/form-data" id="formulario">

        <label>Nome: <input required type="text" class="entrada" name="nome"></label><br>

        <div>
          <label>CPF: <input required type="text" id="cpf" class="entrada" name="cpf"></label>
        </div><br>

        <label id="radio" class="texto">Sexo:
          <input type=radio name=sexo value="Feminino"> Feminino
          <input type=radio name=sexo value="Masculino"> Masculino
        </label><br>

        <div>
          <label>Data de nascimento: <input required type="date" class="entrada" name="data_nasc" min="1900-01-01" max="2010-12-31"></label>
        </div>

        <div>
          <label>CEP: <input required type="text" id="cep" class="entrada" name="cep"></label>
        </div>

        <label>Logradouro: <input required type="text" class="entrada" name="logradouro" id="logradouro" class="desab" readonly></label></label><br>

        <label>Número: <input required type="number" class="entrada" name="numero"></label></label><br>

        <label>Complemento: <input type="text" class="entrada" name="complemento"></label></label><br>

        <label>Bairro: <input required type="text" class="entrada" name="bairro" id="bairro" class="desab" readonly></label></label></label><br>

        <label>Cidade: <input required type="text" class="entrada" name="cidade" id="cidade" class="desab" readonly></label></label></label><br>

        <label>UF: <input required type="text" class="entrada" name="uf" id="uf" class="desab" readonly></label><br>

        <div>
          <label>E-mail: <input required type="email" class="entrada" name="email" id="email"></label>
        </div>

        <label>Foto: <input type="file" class="entrada" name="foto" id="foto" /><br><br>

          <input type="submit" value='Enviar' id='enviar' class="botoes">
          <input type="reset" value='Limpar' class="botoes">

      </form>
    </div>
  </main>

  <footer>
    <h3><strong>© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</strong>
    </h3>
    <h3><strong>Trabalho orientado pelo professor William Geraldo Sallum</strong></h3>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js">
  </script>
  <script src="../JSs/validacao.js"></script>
  <script src="../JSs/mascara_form.js"></script>
</body>

</html>
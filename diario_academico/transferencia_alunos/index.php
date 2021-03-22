<?php
session_start();
?>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
  <title>Transferência de Alunos - Diário Acadêmico</title>
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
          <li><a href="#">Campi</a></li>
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
    <h3 class="sub">Bem-vindo(a) à</h3>
    <h1 class="principal">Solicitação de Transferência</h1>

    <?php
    if (!isset($_SESSION['tableIsReady'])) {
    ?>

      <p class="descricao">Para solicitar a transferência, basta inserir o CPF do aluno abaixo.</p>
      <div id="ajuste">
        <div id="formulario">
          <input class="texto" type="text" id="cpf" name="cpf" placeholder="CPF" data-mask="000.000.000-00">

          <?php
            if (isset($_SESSION['situacao'])) {
              echo '<p id="erro">' . $_SESSION['situacao'] . '</p>';
              unset($_SESSION['situacao']);
            }
          ?>

          <div id="divBotoes">
            <button class="botoes" id="enviar">Enviar</button>
            <button class="botoes" id="limpar">Limpar</button>
          </div>
        </div>

      <?php
        } else {
      ?>

        <p class="descricao">Transferência realizada com sucesso.</p>
        <h3 class="sub">Histórico escolar</h3>
        <div id="ajuste">

        <?php
              echo '
              <div id="resultado" class="solid">' .
                $_SESSION['historico'] .
                '</div>' .
                '<button class="botoes" id="voltar" onclick="location.reload()">Voltar</button>
                <button class="botoes" id="pag-inicial">Ir para página inicial</button>';
              unset($_SESSION['cpf']);
              unset($_SESSION['historico']);
              unset($_SESSION['tableIsReady']);
          }
        ?>
        </div>
  </main>

  <footer>
    <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
    <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
  </footer>

  <script src="js/request_historico.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>
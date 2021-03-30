<?php
  @session_start();
  include '../../sistema_login/verifica_login.php';
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
  
  <title>Transferências | SIDA</title>
</head>

<body>
  <header>
    <img src="../../imgs/sidaLogo.jpg" alt="logo" id="logo">
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
        '<button class="botoes" id="voltar" onclick="location.reload()">Voltar</button>';
        unset($_SESSION['cpf']);
        unset($_SESSION['historico']);
        unset($_SESSION['tableIsReady']);
      }
        ?>
        </div>
  </main>

  <footer>
    <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
    <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
  </footer>

  <script src="js/request_historico.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</body>

</html>

<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manutenção de Diarios</title>
    <link rel="stylesheet" href="geral_diario.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <img src="../../imgs/sidaLogo.jpg" alt="logo" id="logo" />
      <h1 id="titulo">Manutenção de Diarios</h1>
      <div id="dados_user">
        <div id="aux">
            <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
            <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
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
      <h1 class="principal">Manutenção de Diarios</h1>
      <p class="descricao">
        Deseja acessar conteudos, atividades ou presenças itens do diario? Para
        isso basta selecionar uma das opções abaixo!
      </p>

      <fieldset id="fieldset" class="tamanho">
        <legend>Selecione a pagina que deseja acessar</legend>
        <select id="caixa-seleção">
          <option value=" ">-- selecione uma opção --</option>
          <option value="conteudos">Conteúdos</option>
          <option value="atividades">Atividades</option>
          <option value="presencas">Presenças</option>
        </select>
        <input class="botao" type="submit" value="enviar" />
      </fieldset>
    </main>
    <script src="diario_geral.js"></script>
    <footer>
      <h3 class="rodape">
        © NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso
        em 2019 do CEFET-MG
      </h3>
      <h3 class="rodape">
        Trabalho orientado pelo professor William Geraldo Sallum
      </h3>
    </footer>
  </body>
</html>

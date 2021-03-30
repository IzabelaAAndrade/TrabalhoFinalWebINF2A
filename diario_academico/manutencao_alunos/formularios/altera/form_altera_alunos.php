<!--
  Formulário para alterar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php menu_altera_alunos
  Grupo F - desenvolvido por Tássyla Lima
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
  <link rel="stylesheet" href="../../CSSs/style.css">

  <title>Manutenção</title>
</head>

<body>

  <header>
    <img src="../../CSSs/img/logo.jpg" alt="logo" id="logo">
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
      <li><a href="../../../">Home</a></li>
      <li><a href="#">Sobre</a></li>
      <li><a href="#">Manutenção</a>
        <ul class="sub_menu">
          <li><a href="../../../campi/campi.php">Campi</a></li>
          <li><a href="../../../manutencao_departamentos/">Departamentos</a></li>
          <li><a href="../../../manutencao_cursos/">Cursos</a></li>
          <li><a href="../../../manutencao_turmas/">Turmas</a></li>
          <li><a href="../../">Alunos</a></li>
          <li><a href="../../../manutencao_professores/">Professores</a></li>
          <li><a href="../../../manutencao_disciplinas/">Disciplinas</a></li>
          <li><a href="../../../manutencao_etapas/">Etapas</a></li>
          <li><a href="../../../manutencao_diarios/">Diários</a></li>
        </ul>
      </li>
      <li><a href="../../../menu_relatorios/">Relatórios</a></li>
      <li><a href="../../../transferencia_alunos/">Transferências</a></li>
    </ul>
  </nav>

  <main>
    <h3 class="sub">Bem-Vindo(a) ao</h3>
    <h1 class="principal">Aterar Dados da(o) Aluna(o)</h1>
    <p class="descricao">Altere os campos que desejar.<br>Nome, CPF e data de nascimento não podem ser alterados.</p>
    <div id="ajuste">

      <?php
      include_once('../../lib/libConnection.php');

      $cpf = $_SESSION['cpf'];
      $data_nascimento = $_SESSION['data_nasc'];

      $query = mysqli_query($conexao, "SELECT * FROM alunos WHERE id = '$cpf' AND nascimento = '$data_nascimento'");

      if (mysqli_num_rows($query) == 1) {
        while ($dados = mysqli_fetch_array($query)) {

      ?>
          <h1>Altera Aluno</h1>

          <form action="../../PHPs/altera/altera_alunos_bd.php" method="post" enctype="multipart/form-data">
            <label>Nome: <input required class="texto" type="text" name="nome" value="<?php echo $dados['nome']; ?>" class="desab" readonly=“true”></label>
            <label>CPF: <input required class="texto" type="text" id="cpf" name="cpf" value="<?php echo $dados['id']; ?>" class="desab" readonly=“true”></label>
            <label>Data de nascimento: <input required class="texto" type="date" name="data_nasc" min="1900-01-01" max="2010-12-31" value="<?php echo $dados['nascimento']; ?>" class="desab" readonly=“true”></label>

            <label id="radio" class="texto">Sexo:
              <input type=radio name=sexo value="Feminino" <?php if ($dados['sexo'] == 'Feminino') echo "checked"; ?>> Feminino
              <input type=radio name=sexo value="Masculino" <?php if ($dados['sexo'] == 'Masculino') echo "checked"; ?>> Masculino
            </label>

            <label>CEP: <input required class="texto" type="text" id="cep" name="cep" value="<?php echo $dados['cep']; ?>"></label>
            <label>Logradouro: <input required class="texto" required type="text" name="logradouro" value="<?php echo $dados['logradouro']; ?>" id="logradouro" class="desab" readonly></label>
            <label>Número: <input required class="texto" required type="number" name="numero" value="<?php echo $dados['numero']; ?>"></label>
            <label>Complemento: <input class="texto" type="text" name="complemento" value="<?php echo $dados['complemento']; ?>"></label>
            <label>Bairro: <input required class="texto" required type="text" name="bairro" value="<?php echo $dados['bairro']; ?>" id="bairro" class="desab" readonly></label>
            <label>Cidade: <input required class="texto" required type="text" name="cidade" value="<?php echo $dados['cidade']; ?>" id="cidade" class="desab" readonly></label>
            <label>UF: <input required type="text" class="texto" name="uf" id="uf" value="<?php echo $dados['uf'] ?>" id="uf" class="desab" readonly><br></label>

            <label>E-mail: <input required class="texto" required type="email" name="email" value="<?php echo $dados['email']; ?>" id="email"></label>

            <label>Foto: <input class="texto" type="file" class="entrada" name="foto" id="foto" /></label><br>

            <?php
            if ($dados['foto'] != "") {
              $url = "../../imagens/" . $dados['foto'];
              echo "<div id='foto'><img id='perfil' src='$url'></img></div>";
            }
            ?>

            <div id="divBotoes">
              <input required class="botoes" type="submit" value='Enviar'>
              <input required class="botoes" type="reset" value='Cancelar' onclick="window.location.href='form_confere_dados.php'"><br>
            </div>
          </form>

      <?php
        }
      }
      ?>
    </div>
  </main>

  <footer>
    <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
    <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script src="../../JSs/validacao.js"></script>
  <script src="../../JSs/mascara_form.js"></script>
</body>

</html>

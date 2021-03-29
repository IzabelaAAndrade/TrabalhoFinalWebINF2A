<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style_turmas.css">
   <link rel = "stylesheet" href = "css/tabela.css">
   <link rel = "stylesheet" href = "css/index.css">
   <title>Manutenção de Turmas | SIDA</title>
</head>
<body>
  <header>
    <img src="img/sidaLogo.jpg" alt="logo" id="logo">
    <h1 id="titulo">Sistema Academico</h1>
  </header>
  <nav>
  <ul class="menu">
         <li><a href="../index.html">Home</a></li>
         <li><a href="../sobre.html">Sobre</a></li>
         <li><a href="#">Manutenção</a>
            <ul class="sub_menu">
               <li><a href="../campi/campi.php">Campi</a></li>
               <li><a href="../manutencao_departamentos/">Departamentos</a></li>
               <li><a href="../manutencao_cursos/index.php">Cursos</a></li>
               <li><a href="index.php">Turmas</a></li>
               <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
               <li><a href="../manutencao_professores/index.html">Professores</a></li>
               <li><a href="../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
               <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
               <li><a href="../manutencao_diarios/index.html">Diários</a></li>
            </ul>
         </li>
         <li><a href="../menu_relatorios/index.php">Relatórios</a>
            <ul class="sub_menu">
               <li><a href="../menu_relatorios/relatorio_certificado/index.php">Certificados</a></li>
               <li><a href="../menu_relatorios/relatorio_certificado/index.php">Histórico por Aluno e Turma</a></li>
               <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
               <li><a href="../menu_relatorios/relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
               <li><a href="../menu_relatorios/manutencao_professores/index.php">Relação de Professores</a></li> 
            </ul>
         </li>
         <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
      </ul>
  </nav>
<main>
  <div>
    <?php
      include '../lib/conexao.php';
      global $conexao;

      $sql = "SELECT id, nome FROM cursos WHERE id = '".$_GET['id']."'";
      $resultado = mysqli_query($conexao, $sql);
      $row = mysqli_fetch_array($resultado);
      echo "<p class='pSimples'><a href='index.php'>Manutenção de Turmas</a> > Turmas de ".$row['nome']."</p>";
      echo "<h1 class='principal'>Manutenção de Turmas</h1>";
      echo  "<h2 class='centro'> Turmas de ".$row["nome"]."</h2><br>" ;
    ?>
  </div>
  <div class="divTabela">
    <?php
      $get = $_GET['id'];

      $sql1 = "SELECT id, id_cursos, nome FROM turmas WHERE id_cursos = '".$_GET['id']."'";
      $resultado1 = mysqli_query($conexao, $sql1);
      
      if (mysqli_num_rows($resultado1) > 0) {
        $return = "<table id='tabela'><thead><th>ID Turma</th><th>Nome Turma</th><th>ID Curso</th><th></th><th></th></thead><tbody>";
        while($row = mysqli_fetch_array($resultado1)) {
          $return .= "<tr><td id='campoId".$row['id']."'>".$row['id']."</td><td id='campoNome".$row['id']."'>".$row['nome']."</td><td>".$row['id_cursos']."</td><td><button id='btnEditar".$row['id']."' onclick='getIdTurma(".$row['id'].");' class='btnAlterar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></td><td><button id='btnDeletar".$row['id']."' class='btnDeletar btn btn-info btn-lg' data-toggle='modal' data-target='#deletarTurmaModal'>Deletar</button></td></tr>";        }
        $return .= "</tbody></table></div>";
      } else {
        $return = "Existem 0 turmas para esse curso";
      }

      echo $return;
      mysqli_close($conexao);
    ?>
  </div>

  <div class="modal fade" id="alterarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2 class="h2Simples">Alterar turma</h2>
        </div>
        <form name="form" id="formAlterar"  method="POST" enctype="application/x-www-form-urlencoded" action="alterar_turma.php">
          <div class="modal-body">
            <p id="msgAlterar">Preencha apenas os dados que deseja alterar</p>
            <p><input class="inputEditar"  type="text" name="nomeTurma" placeholder="Novo Nome"></p>
            <p><input class="inputEditar" type="text" name="idCurso" placeholder="Novo ID do Curso"></p>
            <p class="result" id="resultA"></p>
          </div>
          <div class="modal-footer">
            <input class="botoes" type="submit" value="Confirmar">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="criarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2 class="h2Simples">Criar nova turma</h2>
        </div>
        <form name="form" id="formCriar"  method="POST" enctype="application/x-www-form-urlencoded" action="criar_turmas.php">
          <div class="modal-body">
            <p><input type="text" name="nomeTurmaC" placeholder="Nome da Turma"></p>
            <p><input type="text" name="idCursoC" placeholder="ID do Curso"></p>
            <p class="result" id="resultC"></p>
          </div>
          <div class="modal-footer">
            <input class="botoes" type="submit" id="btnConfirmaCriar" value="Confirmar">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="deletarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2 class="h2Simples">Deletar turma</h2>
        </div>
        <div class="modal-body">
          <p id="msgDeletar">Deseja deletar a turma <span id="nomeTurmaD"></span> [ID <span id="idTurmaD"></span>]?</p>
          <p class="result" id="resultD"></p>
        </div>
        <div class="modal-footer">
        <input  class="botoes" type="button" id="confirmaDeletar" value="Confirmar">
        </div>
      </div>
    </div>
    </div>
  <br>
   <div id="divBtnCriar"><button  class="botoes" id='btnCriar'  class='btnCriar btn btn-info btn-lg' data-toggle='modal' data-target='#criarTurmaModal'>Criar Nova Turma</button></div>
  <br><br>
  <footer>
            <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>  
  <script src="js/ajax_alterar_turma.js"></script>
  <script src="js/ajax_criar_turma.js"></script>
  <script src="js/ajax_deletar_turma.js"></script>
  <script src="js/handler_deletar_turma.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

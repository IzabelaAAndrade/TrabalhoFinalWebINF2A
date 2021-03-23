<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style_turmas.css">
   <link rel = "stylesheet" href = "../index.css">
    <title>Turmas</title>
</head>
<body>
<header>
      <img src="../img/LogoExemploCortado.png" alt="logo" id="logo">
      <h1 id="titulo">Sistema Academico</h1>
   </header>
        
        <nav>
        <ul class="menu" >
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
  <div>

  <br><br><br><br>
    <?php
      include 'conexao.php';

      $sql = "SELECT id, nome FROM cursos WHERE id = '".$_GET['id']."'";
      $resultado = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($resultado);
      echo "<p class='pSimples'><a href='manutencao_turmas.php'>Manutenção de Turmas</a> > Turmas de ".$row['nome']."</p>";
      echo "<h1 class='principal'>Manutenção de Turmas</h1>";
      echo  "<h2 class='centro'> Turmas de ".$row["nome"]."</h2><br>" ;
    ?>
  </div>
  <div>
    <?php
      include 'conexao.php';

      $get = $_GET['id'];

      $sql1 = "SELECT id, id_cursos, nome FROM turmas WHERE id_cursos = '".$_GET['id']."'";
      $resultado1 = mysqli_query($connection, $sql1);
      
      if (mysqli_num_rows($resultado1) > 0) {
        $return = "<div style='overflow-x:auto;'><table class='tableTurmas' id='tableTurmas'><thead><tr><th>ID Turma</th><th>Nome Turma</th><th>ID Curso</th><th></th><th></th></tr></thead><tbody>";
        while($row = mysqli_fetch_array($resultado1)) {
          $return .= "<tr>
          <td id='campoId".$row['id']."'>".$row['id']."</td>
          <td id='campoNome".$row['id']."'>".$row['nome']."</td>
          <td class='campoIdCurso'>".$row['id_cursos']."</td>
          <td><button class='botoes' id='btnEditar".$row['id']."' onclick='getIdTurma(".$row['id'].");' class='btnEditar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></td>
          <td><button class='botoes' id='btnDeletar".$row['id']."' class='btnDeletar btn btn-info btn-lg' data-toggle='modal' data-target='#deletarTurmaModal'>Deletar</button></td>
          </tr>";        }
        $return .= "</tbody></table></div>";
      } else {
        $return = "Existem 0 turmas para esse curso";
      }

      echo $return;
      mysqli_close($connection);
    ?>
  </div>

  <div class="modal fade" id="alterarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2 class="h2Simples">Alterar turma</h2>
            <p class="pSimples">Preencha apenas os dados que deseja alterar</p>
        </div>
        <div class="modal-body">
          <form name="form" id="formAlterar"  method="POST" enctype="application/x-www-form-urlencoded" action="alterar_turma.php">
            <p class="pSimples">Nome da Turma:<input class="inputEditar"  type="text" name="nomeTurma"></p>
            <p class="pSimples">ID do Curso:<input class="inputEditar" type="text" name="idCurso"></p>
            <p id="resultA"></p>
            <div class="modal-footer">
              <input class="botoes" type="submit" value="Confirmar">
            </div>
          </form>
        </div>
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
        <div class="modal-body">
          <form name="form" id="formCriar"  method="POST" enctype="application/x-www-form-urlencoded" action="criar_turmas.php">
          <p class="pSimples">Nome da Turma:<input type="text" name="nomeTurmaC"></p>
            <p class="pSimples">Id do Curso:<input type="text" name="idCursoC"></p>
            <div class="modal-footer">
              <input class="botoes type="submit" id="btnConfirmaCriar" value="Confirmar">
            </div>
          </form>
          <p id="resultC"></p>
        </div>
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
          <p class="pSimples">Deseja deletar esta turma?</p>
          <p class="pSimples">ID da turma: <span id="idTurmaD"></span></p>
          <p class="pSimples">Nome da Turma: <span id="nomeTurmaD"></span></p>
          <p id="resultD"></p>
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
            <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
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

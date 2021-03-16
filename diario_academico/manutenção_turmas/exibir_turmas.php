<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Mostra turmas</title>
</head>
<body>
<?php
  include 'conect_bd.php';

  $get = $_GET['id'];

  $sql1 = "SELECT id, id_cursos, nome FROM turmas WHERE id_cursos = '".$_GET['id']."'";
  $sql = "SELECT id, nome FROM cursos WHERE id = '".$_GET['id']."'";
  $resultado = mysqli_query($connection, $sql);
  $resultado1 = mysqli_query($connection, $sql1);

  $coluna = mysqli_fetch_array($resultado);
  echo  "<h1> Turmas do curso de ".$coluna["nome"]."</h1>" ;

  if (mysqli_num_rows($resultado1) > 0) {
    while($coluna = mysqli_fetch_array($resultado1)) {
      echo "<div id='turma".$coluna['id']."'>";
      echo "<div><b>Nome da turma:</b> " . $coluna["nome"]."</div>";
      echo "<div><p> <b>Id</b>: " . $coluna["id"]."</p></div>";
      echo "<button id='btnEditar".$coluna['id']."' onclick='getIdTurma(".$coluna['id'].");' class='btnEditar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></div><br>";
	  
	}
  } else {
    echo "Existem 0 turmas para esse curso";
  }

  mysqli_close($connection);
?>
  <div class="modal fade" id="alterarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2>Alterar turma</h2>
            <p>Preencha apenas os dados que deseja alterar</p>
            <p id="result"></p>
        </div>
        <div class="modal-body">
        <form name="form" id="formAlterar"  method="POST" enctype="application/x-www-form-urlencoded" action="alterar_turma.php">
          <p>ID do Curso:<input type="text" name="idCurso"></p>
          <p>Nome da Turma:<input type="text" name="nomeTurma"></p>
          <input type="submit" value="Confirmar">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
<br>
 <?php
 
 echo "<br><br><button id='btnAdicionar' class='btnAdicionar btn btn-info btn-lg' data-toggle='modal' data-target='#adicionarTurmaModal'>Criar Nova Turma</button></div>";
?>
<div class="modal fade" id="adicionarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;</button>
            <h2>Criar nova turma</h2>
            <p>Preencha todos os dados </p>
            <p id="result1"></p>
        </div>
        <div class="modal-body">
        <form name="form" id="formCriar"  method="POST" enctype="application/x-www-form-urlencoded">
          <p>ID da turma:<input type="text" name="idTurma"></p>
          <p>Nome da Turma:<input type="text" name="nomeTurma"></p>
		  <p>Id do curso:<input type="text" name="idCurso"></p>
          <input type="submit" value="Confirmar">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="ajax_alterar_turma.js"></script>
</body>
</html>

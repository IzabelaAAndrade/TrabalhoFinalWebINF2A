<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style_turmas.css">
   <link rel = "stylesheet" href = "../index.css">
</head>
<?php
  include 'conexao.php';

  if(isset($_POST['busca'])){
    $search = $_POST['busca'];
    $sql = "SELECT * FROM turmas WHERE id LIKE '%$search%' OR nome LIKE '%$search%'";
    $resultado = mysqli_query($connection, $sql);
    $queryResultado = mysqli_num_rows($resultado);

    $return = "<p class='pSimples'>Existe(m) ".$queryResultado." resultado(s) para sua pesquisa.</p>";
    if($queryResultado > 0){
      $return .= "<table class='tableTurmas'><thead><tr><th>ID Turma</th><th>Nome Turma</th><th>ID Curso</th><th></th><th></th></tr></thead><tbody>";

      while($row = mysqli_fetch_array($resultado)) {
        $return .= "<tr><td id='campoId".$row['id']."'>".$row['id']."</td><td id='campoNome".$row['id']."'>".$row['nome']."</td><td>".$row['id_cursos']."</td><td><button class='botoes' id='btnEditar".$row['id']."' onclick='getIdTurma(".$row['id'].");' class='btnEditar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></td><td><button class='botoes' id='btnDeletar".$row['id']."' class='btnDeletar btn btn-info btn-lg' data-toggle='modal' data-target='#deletarTurmaModal'>Deletar</button></td></tr>";
      }
      $return .= "</tbody></table>";
    } else{
      $return = "<p id=\"erroPesquisa\">Nenhuma turma encontrada.</p>";
    }
    echo $return;
  }
  mysqli_close($connection);
?>
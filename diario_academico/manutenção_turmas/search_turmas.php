<?php
  include 'conexao.php';

  if(isset($_POST['busca'])){
    $search = $_POST['busca'];
    $sql = "SELECT * FROM turmas WHERE id LIKE '%$search%' OR nome LIKE '%$search%'";
    $resultado = mysqli_query($connection, $sql);
    $queryResultado = mysqli_num_rows($resultado);

    $return = "<p>Existe(m) ".$queryResultado." resultado(s) para sua pesquisa.</p>";
    if($queryResultado > 0){
      $return .= "<table><thead><tr><th>ID Turma</th><th>Nome Turma</th><th>ID Cuso</th><th></th><th></th></tr></thead><tbody>";

      while($row = mysqli_fetch_array($resultado)) {
        $return .= "<tr><td id='campoId".$row['id']."'>".$row['id']."</td><td id='campoNome".$row['id']."'>".$row['nome']."</td><td>".$row['id_cursos']."</td><td><button id='btnEditar".$row['id']."' onclick='getIdTurma(".$row['id'].");' class='btnEditar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></td><td><button id='btnDeletar".$row['id']."' class='btnDeletar btn btn-info btn-lg' data-toggle='modal' data-target='#deletarTurmaModal'>Deletar</button></td></tr>";
      }
      $return .= "</tbody></table>";
    } else{
      $return = "<p>Nenhuma turma encontrada.</p>";
    }

    echo $return;
  }
  mysqli_close($connection);
?>
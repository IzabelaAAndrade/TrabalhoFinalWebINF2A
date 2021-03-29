<?php
  include '../lib/conexao.php';

  if(isset($_POST['busca'])){
    $search = $_POST['busca'];
    $sql = "SELECT * FROM turmas WHERE id LIKE '%$search%' OR nome LIKE '%$search%'";
    $resultado = mysqli_query($conexao, $sql);
    $queryResultado = mysqli_num_rows($resultado);

    $return = "<p id='numResultadosBusca'>Existe(m) ".$queryResultado." resultado(s) para sua pesquisa.</p>";
    if($queryResultado > 0){
      $return .= "<table><thead><th>ID Turma</th><th>Nome Turma</th><th>ID Curso</th><th></th><th></th></thead><tbody>";

      while($row = mysqli_fetch_array($resultado)) {
        $aspas = '"';
        $return .= "<tr><td id='campoId".$row['id']."'>".$row['id']."</td><td id='campoNome".$row['id']."'>".$row['nome']."</td><td>".$row['id_cursos']."</td><td><button id='btnEditar".$row['id']."' onclick='getIdTurma(".$row['id'].");' class='btnEditar btn btn-info btn-lg' data-toggle='modal' data-target='#alterarTurmaModal'>Editar</button></td><td><button onclick='getDadosDeletar(".$row['id'].",".$aspas.$row['nome'].$aspas.");' id='btnDeletar".$row['id']."' class='btnDeletar btn btn-info btn-lg' data-toggle='modal' data-target='#deletarTurmaModal'>Deletar</button></td></tr>";
      }
      $return .= "</tbody></table>";
    } else{
      $return = "<p id='nenhumResultadoPesquisa'>Nenhuma turma encontrada.</p>";
    }

    echo $return;
  }
  mysqli_close($conexao);
?>
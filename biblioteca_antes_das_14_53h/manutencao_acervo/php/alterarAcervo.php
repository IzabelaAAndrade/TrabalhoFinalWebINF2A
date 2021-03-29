<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="biblioteca";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sql = mysqli_select_db($con,$dbname);

$tipo = $_POST["tipo"];

$id=$_POST['id_obra'];
$id_campi=$_POST['id_campi'];
$nome=$_POST['nome'];
$local=$_POST['local'];
$ano=$_POST['ano'];
$editora=$_POST['editora'];
$paginas=$_POST['paginas'];
$id_acervo=$_POST['id_acervo'];

if (strcmp($tipo, "academicos")==0) {

  $programa=$_POST['programa'];

  $sql=mysqli_query($con,"SELECT * FROM acervo WHERE id='$id_acervo'");
  if (!(mysqli_num_rows($sql) > 0)) {
    echo "<script>alert('Não foi possível alterar esse acadêmico');</script>";
    echo "<script>location.href='../index_acervo.php'</script>";
  }
  else{
    mysqli_query($con,"UPDATE academicos SET id_acervo='$id_acervo', programa='$programa' WHERE id_obra='$id'");
    echo "<script>alert('Acadêmico alterado com sucesso!');</script>";
    echo "<script>location.href='../index_acervo.php'</script>";
  }
}
else if (strcmp($tipo, "autores")==0) {
  $id_autor=$_POST['id_autor'];
  $nome_autor=$_POST['nome_autor'];
  $sobrenome_autor=$_POST['sobrenome_autor'];
  $ordem=$_POST['ordem'];
  $qualificacao=$_POST['qualificacao'];

  $sql = mysqli_query($con, "SELECT * FROM autores WHERE Id_obra='$id'");
  if (!(mysqli_num_rows($sql) > 0)) {
    echo "<script>alert('Não foi possível alterar esse autor');</script>";
    echo "<script>location.href='../index_acervo.php'</script>";
  }
  else {
    mysqli_query($con,"UPDATE autores SET Nomes='$nome_autor', Sobrenomes='$sobrenome_autor', Ordem='$ordem', Qualificacao='$qualificacao' WHERE Id_autor='$id_autor'");
    echo "<script>alert('Autor alterado com sucesso!');</script>";
    echo "<script>location.href='../index_acervo.php'</script>";
  }
}
else if (strcmp($tipo, "livros")==0) {
    $edicao=$_POST['edicao'];
    $isbn=$_POST['isbn'];

    $sql=mysqli_query($con,"SELECT * FROM acervo WHERE id='$id_acervo'");
    if (!(mysqli_num_rows($sql)) > 0) {
        echo "<script>alert('Não é possível alterar esse livro');</script>";
        echo "<script>location.href='../index_acervo.php'</script>";
      }
    else{
      mysqli_query($con,"UPDATE livros SET id_acervo='$id_acervo', edicao='$edicao',isbn='$isbn' WHERE id_obra='$id'");
      echo "<script>alert('Livro alterado com sucesso!');</script>";
      echo "<script>location.href='../index_acervo.php'</script>";
    }
  }
elseif (strcmp($tipo, "periodicos")==0) {
  $periodicidade=$_POST['periodicidade'];
  $mes=$_POST['mes'];
  $volume=$_POST['volume'];
  $subtipo=$_POST['subtipo'];
  $issn=$_POST['issn'];
  $titulo=$_POST['titulo'];
  $pag_inicio=$_POST['pag_inicio'];
  $pag_final=$_POST['pag_final'];
  $palavras_chave=$_POST['palavras_chave'];
}

mysqli_query($con,"UPDATE acervo SET id_campi='$id_campi', nome='$nome', local='$local', ano='$ano', editora='$editora', paginas='$paginas' WHERE id='$id_acervo'");
 ?>

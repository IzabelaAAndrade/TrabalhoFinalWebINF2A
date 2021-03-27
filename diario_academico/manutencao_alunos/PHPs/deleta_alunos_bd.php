<!--
  Deleta alunos do bd - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Lucas Gabriel e Mayara Mendes
-->

<?php
session_start();

/*********** CONECTANDO AO BANCO DE DADOS ***********/
include_once('../lib/libConnection.php');

/************* OBTENDO OS DADOS DO FORM *************/
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];

/*********** DELETA OS REGISTROS DO ALUNO ***********/
$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE id = \"$cpf\"");

if (mysqli_num_rows($query) != 1)
  $_SESSION['deleta_false'] = "CPF incorreto!";
else {
  /* Testar se os dados informados batem! */
  while ($aluno = mysqli_fetch_assoc($query))
    if ($aluno['nascimento'] != $data_nasc)
      $_SESSION['deleta_false'] = "Data de nascimento incorreta!";

    else {
      $aluno = "DELETE FROM alunos WHERE id = '$cpf';";

      if (mysqli_query($conexao, $aluno))
        $_SESSION['deleta_true'] = "Registros excluídos com sucesso.";
      else
        die("Erro ao tentar excluir registro");
    }
}

mysqli_close($conexao);

if(isset($_SESSION['deleta_true']))
  header('Location: ../index.php');
else if(isset($_SESSION['deleta_false']))
  header('Location: ../formularios/form_deleta_alunos.php');

?>

<!--
  Altera alunos do bd - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Tássyla Lissa Lima
-->

<?php
session_start();

/*********** CONECTANDO AO BANCO DE DADOS ***********/
include_once('../../lib/libConnection.php');

/*********** PROCURA O REGISTRO NO BD ***************/
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$data_nascimento = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : null;

$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE id = '$cpf' AND nascimento = '$data_nascimento'");
if (mysqli_num_rows($query) != 1) {
  unset($_SESSION['cpf']);
  unset($_SESSION['data_nasc']);
  $_SESSION['erro'] = "CPF e/ou data de nascimento incorretos.";
  header('Location: ../../formularios/altera/form_confere_dados.php');
} else {
  unset($_SESSION['erro']);
  $_SESSION['cpf'] = $cpf;
  $_SESSION['data_nasc'] = $data_nascimento;
  header('Location: ../../formularios/altera/form_altera_alunos.php');
}

?>
<?php

require("conexao.php");

$limite_emprestimos = 3;
$prazo_devolucao = 7; //em dias

$id_aluno = $_POST["Id_alunos"];
$id_acervo = $_POST["Id_acervo"];

function formata_data($data){
	$data = new DateTime($data);
	return $data->format('d/m/Y');
}

function verifica_usuario(){
	global $conexao, $id_aluno, $nome_usuario;
	$query = "SELECT * FROM alunos WHERE id = $id_aluno";
	$resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
	$linhas=mysqli_num_rows($resultado);
	if($linhas==0){
		exit("<div class='alert alert-danger' role='alert'>Erro! Não foi possível localizar usuários com o ID $id_aluno.</div>");
	} else {
		$registro = mysqli_fetch_array($resultado);
		$nome_usuario = $registro["nome"];
	}
}

function verifica_aptidao_usuario(){
	global $conexao, $limite_emprestimos, $id_aluno, $nome_usuario;
	$query = "SELECT count(*) FROM emprestimos WHERE Id_alunos = $id_aluno and Data_devolucao is null";
	$resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
	$data=mysqli_fetch_array($resultado);
	if($data[0]>=$limite_emprestimos){
		exit("<div class='alert alert-danger' role='alert'>Erro! $nome_usuario já possui $data[0] empréstimos em aberto.</div>");
	}
}

function verifica_acervo(){
	global $conexao, $id_acervo;
	$query = "SELECT * FROM acervo WHERE id = $id_acervo";
	$resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
	$linhas=mysqli_num_rows($resultado);
	if($linhas==0){
		exit("<div class='alert alert-danger' role='alert'>Erro! Item $id_acervo não encontrado em nosso acervo.</div>");
	}
}

function verifica_disponibilidade_acervo(){
	global $conexao, $id_acervo;
	$query = "SELECT * FROM emprestimos WHERE Id_acervo = $id_acervo and Data_devolucao is null";
	$resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
	$linhas=mysqli_num_rows($resultado);
	if($linhas>0){
		$registro = mysqli_fetch_array($resultado);
		$usuario_em_posse = $registro["id_alunos"];
		$data_prev_devol = $registro["data_prev_devol"];
		$data_prev_devol = formata_data($data_prev_devol);
		exit("<div class='alert alert-danger' role='alert'>Erro! O item $id_acervo já se encontra emprestado para o usuário $usuario_em_posse, com data prevista de devolução para $data_prev_devol. <a href=''>Fazer Reserva</a>.</div>");
	}
}

verifica_usuario();
verifica_acervo();
verifica_aptidao_usuario();
verifica_disponibilidade_acervo();



$data_emprestimo = date("Y-m-d");
$data_prev_devol = date("Y-m-d", strtotime('+'.$prazo_devolucao.'days', strtotime($data_emprestimo)));
formata_data($data_emprestimo);

$query = "INSERT INTO emprestimos (id_alunos, id_acervo, data_emprestimo, data_prev_devol) VALUES ('$id_aluno', '$id_acervo', '$data_emprestimo', '$data_prev_devol')";
$resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
if($resultado!=null){
	echo "<div class='alert alert-success' role='alert'>Sucesso! Livro $id_acervo emprestado para $nome_usuario.</div>";
}


?>

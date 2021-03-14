<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

Header("Content-type: text/html; charset=utf-8");

define("DB_HOST","localhost");
define("DB_USER","userlegal");
define("DB_PASSWORD","senhalegal");
define("DB_DATABASE","professores");

$nome = $_GET['nome'];
$notamin = $_GET['notamin'];
$notamax = $_GET['notamax'];
$sobrenome = $_GET['sobrenome'];

$filtros = array();

if(isset($nome) && $nome != '')
    array_push($filtros, "nome='$nome'");
if(isset($notamin) && $notamin != '')
    array_push($filtros, "nota>'$notamin'");
if(isset($notamax) && $notamax != '')
    array_push($filtros, "nota<'$notamax'");
if(isset($sobrenome) && $sobrenome != '')
    array_push($filtros, "sobrenome='$sobrenome'");

$filtro = '';
if(count($filtros) != 0)
    $filtro = 'WHERE ' . implode(' AND ', $filtros);

// echo "filtro: $filtro<br>";

// Conexão com o localhost
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link)
    die("Conexão falhou: " . mysqli_connect_error());

mysqli_query($link,"USE " . DB_DATABASE);

$alunos = mysqli_query($link,"SELECT * from alunos $filtro ORDER BY nome ASC"); // ordena por ordem alfabética
// $alunos = mysqli_query($conexao,"SELECT * from alunos ORDER BY id_aluno") or die(mysqli_error()); // ordena por id
// $alunos = mysqli_query($conexao,"SELECT * from alunos ORDER BY nota") or die(mysqli_error()); // ordena por nota

if (!$alunos)
    printf("Erro ao pegar alunos! ".mysqli_error($link));

echo "<table><tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Nota</th></tr>";

while($aluno = mysqli_fetch_assoc($alunos)){
	$idAluno = $aluno["id_aluno"];
	$nome = $aluno["nome"];
    $sobrenome = $aluno["sobrenome"];
    $nota = $aluno["nota"];

	echo "<tr><td>".$idAluno."</td><td>".$nome."</td><td>".$sobrenome."</td><td>".$nota."</td></tr>";
}

echo "</table>";

?>
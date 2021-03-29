<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */

Header("Content-type: text/html; charset=utf-8");

$nome = $_GET['nome'];
$depto = $_GET['depto'];
$titulacao = $_GET['titulacao'];

$filtros = array();

if(isset($nome) && $nome != '')
    array_push($filtros, "nome='$nome'");
if(isset($depto) && $depto != '')
    array_push($filtros, "id_depto='$depto'");
if(isset($titulacao) && $titulacao != '')
    array_push($filtros, "titulacao='$titulacao'");

$filtro = '';
if(count($filtros) != 0)
    $filtro = 'WHERE ' . implode(' AND ', $filtros);

// echo "filtro: $filtro<br>";

// Conexão com o localhost
include_once '../modal/conexao.php';

$profs = mysqli_query($link,"SELECT * from professores $filtro ORDER BY nome ASC");

if (!$profs)
    printf('Erro ao recuperar professores! '.mysqli_error($link));

$profsJson = '';

while($prof = mysqli_fetch_assoc($profs)) {
    if($profsJson != '')
        $profsJson .= ',';
	$profsJson .= '{"id":"' . $prof['id'] . '","nome":"' . $prof['nome'] . '","titulacao":"' . $prof['titulacao'] . '"}';
}

echo '{"lista":[' . $profsJson . ']}';
// {"profs":[{"id":"0000042","nome":"Fabricio"},{"id":"0000003","nome":"Sallum"},{"id":"0000001","nome":"Silvia"}]}

?>


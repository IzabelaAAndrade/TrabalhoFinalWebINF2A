<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */

Header("Content-type: text/html; charset=utf-8");

define("DB_HOST","localhost");
define("DB_USER","userlegal");
define("DB_PASSWORD","senhalegal");
define("DB_DATABASE","academico");

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
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link)
    die("Conexão falhou: " . mysqli_connect_error());

mysqli_query($link,"USE " . DB_DATABASE);

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

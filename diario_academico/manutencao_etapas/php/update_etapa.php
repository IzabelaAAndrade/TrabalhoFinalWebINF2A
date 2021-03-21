<?php

$conn = mysqli_connect('localhost', 'root', '', 'academico');

$data = json_decode($_POST['data']);

$id_old = null;
$valor_old = null;

if(isset($_GET['embed-form']) && $_GET['embed-form'] == 'true') {
    $id_old = $data->id_old;
    $sql = "SELECT valor FROM etapas WHERE id = $id_old";
    if($result = mysqli_query($conn, $sql))
        $valor_old = mysqli_fetch_array($result)['valor'];
} else {
    $id_old = $_GET['id_old'];
    $valor_old = $_GET['valor_old'];
}

$id = $data->id == '' ? $id_old : $data->id;
$valor = $data->valor == '' ? $valor_old : $data->valor;

$sql = "UPDATE etapas SET id = $id, valor = $valor WHERE id = $id_old";
if(mysqli_query($conn, $sql)) http_response_code(200);

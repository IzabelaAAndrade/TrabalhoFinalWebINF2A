<?php

$data = json_decode($_POST['data']);
$ordem = $data->ordem;

$conn = mysqli_connect('localhost', 'root', '', 'academico');

$sql = 'SELECT * FROM etapas ORDER BY id';

if($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_row($result)) {
            if($row[0] == $ordem) {
                echo false;
                die();
            }
        }
    }
}

$valor = $data->valor;

$sql = "INSERT INTO etapas VALUES(
    $ordem,
    $valor
)";

if(mysqli_query($conn, $sql)) http_response_code(200);

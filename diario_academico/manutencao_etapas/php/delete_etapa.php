<?php

$id = $_POST['id'];

if($id == '' || $id == null) {
    echo '<div class="error-msg">Id vazio</div>';
    http_response_code(201);
    die();
}

$conn = mysqli_connect('localhost', 'root', '', 'academico');
$sql = "DELETE FROM etapas WHERE id = $id";

if(mysqli_query($conn, $sql)) http_response_code(200);

<?php

$data = json_decode($_POST['data']);

// Checa se há algum input vazio
$checkData = get_object_vars($data);
foreach($checkData as $value) {
    if($value == '' || $value == null) {
        http_response_code(200);
        echo 'empty-input';
        die();
    }
}

// Conexão com o DB
$conn = mysqli_connect('localhost', 'root', '', 'biblioteca');

// Checa se o livro está emprestado
$sql = "SELECT id, data_prev_devol FROM emprestimos WHERE id_acervo = $data->id";

if($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $emprestimo_data = [
            'id' => $row['id'],
            'data_devolucao' => $row['data_prev_devol']
        ];
        http_response_code(201);
        echo json_encode($emprestimo_data);
        die();
    }
}

$sql = "SELECT tipo FROM acervo WHERE id = $data->id";
$tipo = mysqli_query($conn, $sql);
$tipo = mysqli_fetch_row($tipo);
$tipo = $tipo[0];

// Deleta o acervo da tabela acervo e da tabela do tipo correspondente
$sql = "DELETE acervo, $tipo FROM acervo INNER JOIN $tipo WHERE acervo.id = $data->id AND $tipo.id_acervo = $data->id";

if(mysqli_query($conn, $sql)) http_response_code(200);

// Adiciona os dados do acervo descartado na tabela descartes
$sql = "INSERT INTO descartes (id_acervo, data_descarte, motivos, operador) VALUES (
    $data->id,
    '" . date('Y-m-d') . "',
    '$data->motivos',
    '$data->operador'
)";

if(mysqli_query($conn, $sql)) http_response_code(200);

mysqli_close($conn);

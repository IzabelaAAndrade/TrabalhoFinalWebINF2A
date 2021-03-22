<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "academico") or die("Falha ao conectar: " . mysqli_connect_error());

$id_aluno = $_POST["cpf"];

$result = mysqli_query($link, "SELECT `ativo` FROM `matriculas` WHERE `id_alunos` = '$id_aluno'");

$i = 0;
$esta_ativo = false;

while ($ativo = mysqli_fetch_array($result)) {
    $i++;
    if($ativo['ativo']=='S'){
        $esta_ativo = true;
    }
}

if($i == 0) {
    $_SESSION['situacao'] = "CPF não encontrado";
    http_response_code(201);
    die();
}
else if($i != 1) {
    $_SESSION['situacao'] = "Erro de consistência: múltiplos CPFs encontrados";
    http_response_code(201);
    die();
}
else if($esta_ativo) {
    if (mysqli_query($link, "UPDATE `matriculas` SET `ativo` = 'N' WHERE `id_alunos` = '$id_aluno'")) {
        $_SESSION['cpf'] = $cpf;
    }
    else {
        $_SESSION['situacao'] = "Erro ao atualizar situação.";
        http_response_code(201);
        die();
    }
}
else {
    $_SESSION['situacao'] = "O aluno já foi desligado.";
    http_response_code(201);
    die();
}

http_response_code(200);

mysqli_close($link);

echo $mensagem;

header('Location: ../');

?>

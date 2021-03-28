<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/header_footer.css">
    <link rel="stylesheet" href="../style/modal.css">
</head>
<body>
<?php include '_top.html'; ?>

<main>
<?php
Header("Content-type: text/html; charset=utf-8");

include_once 'conexao.php';
include_once 'confere.php';
include_once 'mensagem.php';

// Insere dados na tabela Professores
$nome = $_POST['nome'];
$id = $_POST['id'];
$id_depto = $_POST['id_depto'];
$titulacao = $_POST['titulacao'];

$sql = "INSERT INTO `professores` (`id`, `id_depto`, `nome`,`titulacao`) VALUES
('$id', $id_depto, '$nome', '$titulacao')";

if(professorExiste($link, $id))
    mensagem('Erro ao cadastrar professor :(', 'Um professor com esse id já existe!!!');
else if(!deptoExiste($link, $id_depto))
    mensagem('Erro ao cadastrar professor :(', 'O departamento selecionado não existe!!!');
else if (mysqli_query($link, $sql))
    mensagem('Professor cadastrado com sucesso!', '');
else
    mensagem('Erro ao cadastrar professor :(', mysqli_error($link));

?>
</main>

<?php include '_bottom.html'; ?>
</body>
</html>
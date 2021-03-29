<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Deletar Professor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/header_footer.css">
    <link rel="stylesheet" href="../style/modal.css">
</head>
<body>
<?php include '_top.php'; ?>

<main>
<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

Header("Content-type: text/html; charset=utf-8");

include_once 'conexao.php';
include_once 'confere.php';
include_once 'mensagem.php';

$id = $_GET['id'];

$sql_prof = "DELETE FROM `professores` WHERE `id` = '$id'";
$sql_disciplinas = "DELETE FROM `prof_disciplinas` WHERE `Id-Professores` = '$id'";

if(!professorExiste($link, $id))
    mensagem('Erro ao deletar professor :(', 'O professor selecionado não existe!!!');
else if (!mysqli_query($link, $sql_prof))
    mensagem('Erro ao deletar professor :(', mysqli_error($link));
else if (!mysqli_query($link, $sql_disciplinas))
    mensagem('Erro ao deletar disciplinas :(', mysqli_error($link));
else
    mensagem('Professor deletado com sucesso!', '');
?>
</main>

<?php include '_bottom.html'; ?>
</body>
</html>
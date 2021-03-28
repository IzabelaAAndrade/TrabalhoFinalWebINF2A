<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/header_footer.css">
    <link rel="stylesheet" href="../style/modal.css">
</head>
<body>
<?php include '_top.html'; ?>

<main>
<?php 

error_reporting(0);

Header("Content-type: text/html; charset=utf-8");

include_once 'conexao.php';
include_once 'confere.php';
include_once 'mensagem.php';

$nome = $_POST['nome'];
// $siape = $_POST['siape'];
$idAnterior = $_GET['idAnterior'];
$id_depto = $_POST['id_depto'];
$titulacao = $_POST['titulacao'];
    
$edit = "UPDATE 
            `professores`
        SET 
            `nome` = '$nome', 
            `id_depto` = $id_depto,
            `titulacao` = '$titulacao'
        WHERE 
            `professores`.`id` = $idAnterior";

if(!professorExiste($link, $idAnterior))
    mensagem('Erro ao editar professor :(', 'O professor selecionado não existe!!!');
else if(!deptoExiste($link, $id_depto))
    mensagem('Erro ao editar professor :(', 'O departamento selecionado não existe!!!');
else if (mysqli_query($link, $edit))
  mensagem('Professor editado com sucesso!', '');
else
  mensagem('Erro ao editar professor :(', mysqli_error($link));
?>
</main>

<?php include '_bottom.html'; ?>
</body>
</html>
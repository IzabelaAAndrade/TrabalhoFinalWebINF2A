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
<?php include '_top.html'; ?>

<main>

<?php
include_once 'conexao.php';
include_once 'confere.php';
include_once 'mensagem.php';

$id = $_GET['id'];
$prof = null;

$sql = "SELECT * FROM `professores` WHERE `id`='$id'";

if(!professorExiste($link, $id)) {
    mensagem('O professor selecionado não existe!!', '');
}
else if ($result = mysqli_query($link, $sql)) {
    $prof = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $nome = $prof['nome']; 
?>

<form action="deletar_professor.php?id=<?php echo $id?>" method="POST">
    <h2>Deseja realmente deletar o professor?</h2>
    <p>
        <strong>Nome:</strong>
        <?php echo $nome; ?> 
    </p>
    <p>
        <strong>SIAPE:</strong>
        <?php echo $id; ?> 
    </p>     
    <div class="actions">
        <div class="btn" onclick="window.open('../index.html','_self');">Não</div>
        <input type="submit" name="add" value="Sim" class="btn destaque">
    </div>
</form>

<?php
}
else {
    mensagem('Erro ao recuperar professor :(', mysqli_error($link));
}
?>

</main>
    
<?php include '_bottom.html'; ?>
</body>
</html>
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
include_once 'conexao.php';
include_once 'confere.php';
include_once 'mensagem.php';

// if(professorExiste($link, 15))
//     echo 'o professor existe!!';
// else
//     echo 'o professor não existe!!';

function select($titulacao, $valor) {
    echo ($titulacao == $valor ? 'selected' : '');
}

$id = $_GET['id'];
$prof = null;

$sql = "SELECT * FROM `professores` WHERE `id`='$id'";

if(!professorExiste($link, $id)) {
    mensagem('Erro ao editar professor :(', 'O professor selecionado não existe!!!');
}
else if ($result = mysqli_query($link, $sql)) {
    $prof = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $nome = $prof['nome'];
    $depto = $prof['id_depto'];
    $titulacao = $prof['titulacao'];

    // echo $nome;
    // echo $titulacao;
    // echo select($titulacao, 'M');
?>

<form action="editar_professor.php?idAnterior=<?php echo $id; ?>" method="POST">
    <h2>Editar professor</h2>
    <p>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $nome; ?>" required>
    </p>
    <!-- <p>
        <label for="id">SIAPE: </label>
        <input type="number" name="siape" placeholder="Digite o SIAPE" value="<?php echo $id; ?>" required>
    </p>         -->
    <p>
        <label for="id_depto">ID Dpto: </label>
        <input type="number" name="id_depto" placeholder="Digite o ID do Departamento" value="<?php echo $depto; ?>" required>
    </p>
    <p>
        <label for="titulacao">Titulação: </label>
        <select name="titulacao">
            <option value="G" <?php select($titulacao, 'G'); ?>>Graduação</option>
            <option value="E" <?php select($titulacao, 'E'); ?>>Especialização</option>
            <option value="M" <?php select($titulacao, 'M'); ?>>Mestrado</option>
            <option value="D" <?php select($titulacao, 'D'); ?>>Doutorado</option>
        </select>
    </p>
    <div class="actions">
        <div class="btn" onclick="window.open('../index.html','_self');">Voltar</div>
        <input type="reset" name="reset" value="Resetar" class="btn">
        <input type="submit" name="add" value="Salvar" class="btn destaque">
    </div>
</form>

<?php
}
else {
    mensagem('Erro ao editar professor :(', mysqli_error($link));
} 
?>
</main>

<?php include '_bottom.html'; ?>
</body>
</html>
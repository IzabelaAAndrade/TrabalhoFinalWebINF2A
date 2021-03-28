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
        <form action="adicionar_professor.php" method="POST">
            <h2>Adicionar um novo professor</h2>
            <p>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" placeholder="Digite o nome completo" required>
            </p>  
            <p>
                <label for="id">SIAPE: </label>
                <input type="number" name="id" placeholder="Digite o SIAPE" required>
            </p>        
            <p>
                <label for="id_depto">ID Dpto: </label>
                <input type="number" name="id_depto" placeholder="Digite o ID do Departamento" required>
            </p>
            <p>
                <label for="titulacao">Titulação: </label>
                <select name="titulacao">
                    <!-- <option value="" selected></option> -->
                    <option value="G">Graduação</option>
                    <option value="E">Especialização</option>
                    <option value="M">Mestrado</option>
                    <option value="D">Doutorado</option>
                </select>
            </p>
            <div class="actions">
                <div class="btn" onclick="window.open('../index.html','_self');">Voltar</div>
                <input type="submit" name="add" value="Adicionar" class="btn destaque">
            </div>
        </form>
    </main>

    <?php include '_bottom.html'; ?>
</body>
</html>
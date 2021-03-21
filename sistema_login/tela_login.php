<?php
session_start()
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/tela_login.css">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1 class="titulo">Sistema Login</h1>
</header>
<main>
<div id="container">
    <div id="corpo-form">
        <h1>Login</h1>
        <form action="processamento.php" method="post">
            <input class="texto" type="email" placeholder="Email" name="email">
            <input class="texto" type="password" placeholder="Senha" name="senha">
            <input class="botoes" type="submit" value="ACESSAR">
        </form>
        <a href="">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
        <?php
        if (isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] == 2) {
            echo "<div class='msg-erro'><p>Erro: Usuario e/ou senha invalidos.</p>" . "</div>";
        } else if (isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] == 1) {
            echo "<div class='msg-erro'><p>Erro: Por favor preencha todos os campos.</p>" . "</div>";
        }
        unset($_SESSION['nao_autenticado']);
        ?>
    </div>
</div>
</main>
<footer>
    <h3>Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019©</h3>
</footer>
</body>
</html>
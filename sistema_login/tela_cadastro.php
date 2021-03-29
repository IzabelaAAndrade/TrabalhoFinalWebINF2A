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
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/tela.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
                <h1 class = "titulo">Sistemas SORA e SIDA</h1>
        </header>
        <main>
        <div id="container">
            <div id="corpo-form">
                <h1>Cadastro</h1>
                <form action="cadastra.php" method="post">
                    <input class="texto" type="nome" placeholder="Nome" name="nome">
                    <input class="texto" type="email" placeholder="Email" name="email">
                    <input class="texto" type="password" placeholder="Senha" name="senha">
                    <input class="botoes" type="submit" value="CADASTRAR">
                </form>
                <a href="tela_login.php">Já é cadastrado? <strong>Faça o login</strong></a>
            <?php
                if (isset($_SESSION['cadastrado']) && $_SESSION['cadastrado'] == 2) {
                    echo "<div class='msg-erro'><p>Erro: encontramos um cadastro já existente com esse e-mail!</p>" . "</div>";
                } else if (isset($_SESSION['cadastrado']) && $_SESSION['cadastrado'] == 1) {
                    echo "<div class='msg-erro'><p>Erro: Por favor preencha todos os campos.</p>" . "</div>";
                }else if((isset($_SESSION['cadastrado']) && $_SESSION['cadastrado'] == 0)){
                    echo "<div class='msg-sucesso'><p>Cadastro realizado com sucesso!</p>" . "</div>";
                }
                unset($_SESSION['cadastrado']);
                ?>
                
            </div>
        </div>
        </main>
        <footer>
            <h3 class="rodape">© SORA & SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
    </body>
</html>
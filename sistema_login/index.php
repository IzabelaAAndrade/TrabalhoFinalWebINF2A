<?php
@session_start();
include 'verifica_login.php';
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>

    
        <header>
            <h1 class = "titulo">Sistemas SORA e SIDA</h1>
            <div id="dados_user">
                <div id="aux">
                    <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                    <h2 id="sair"><a href="logout.php">Sair</a></h2>
                </div>
            </div>  
        </header>
        
        <main>
            <br>
            <h1 class="titulos">Início</h1>

            <div id="aps">
                <div class="container_ap">
                    <img class="imgs_ap"src="imgs/biblioteca.jpg"/>
                    <div class="apresentacao">
                        <h2>SORA</h2>
                        <p> Chamado de Sistema de Organização de Acervo, o SORA é uma aplicação web que implementa uma organização de biblioteca virtual. </p>
                    </div>
                    <a href="../biblioteca/index.php"><h3>Acesse</h3></a>
                </div>
                <div class="container_ap">
                    <img class="imgs_ap" src="imgs/diario.jpg"/>
                    <div class="apresentacao">
                    <h2>SIDA</h2>
                    <p> Conhecido como Sistema de Diário Acadêmico, o SIDA estrutura um diário acadêmico virtual o qual pode auxiliar professores e instrutores no manejo de suas turmas.</p>
                    <h3><a href="../diario_academico/index.php">Acesse</a></h3>
                    </div>
                </div>
            
            </div>

        </main>
        <footer>
            <h3 class="rodape">© SORA & SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
       
    </body>
</html>

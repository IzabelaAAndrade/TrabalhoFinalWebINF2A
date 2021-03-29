<?php
@session_start();
include '../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SORA | Home</title>
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
              <div id="header-div">
                <img src="../imgs/soraLogo.jpg" alt="logo" id="logo">
                <h1 id="titulo">Sistema de Diário Acadêmico</h1>
            </div>
            <div id="dados_user">
                <div id="aux">
                    <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                    <h2 id="sair"><a href="../sistema_login/logout.php">Sair</a></h2>
                </div>
            </div>  
        </header>

        <nav>
            <ul class="menu">
                <li><a href="../sistema_login/index.php">Início</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="manutencao_acervo/index_acervo.php">Acervo</a></li>
                        <li><a href="manutenção_emprestimos/index.php">Empréstimos</a></li>
                    </ul>
                </li>
                <li><a href="reservas/cria_reserva.php">Reservas</a></li>
                <li><a href="relatorios/index.php">Relatórios</a></li>
            
            </ul>
        </nav>

        <main>
            <h3 class="sub">Bem-Vindo(a) ao</h3>
            <h1 class="principal">SORA</h1>
            <p id="desc-esp" class="descricao">Para a realização das tarefas, basta navegar pelo menu acima! =) 
            </p>
        </main>
            <footer>
                <h3 class="rodape">© SORA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
                <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
            </footer>
        <script src="limpa.js"></script>
    </body>
</html>

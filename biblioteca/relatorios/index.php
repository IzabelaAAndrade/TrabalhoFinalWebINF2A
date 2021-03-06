<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/padrao.css">
    <link rel="stylesheet" href="style/header.css">
    <title>Relatórios</title>
</head>
<body>

    <header>
        <img src="img/soraLogo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema de Organização de Acervo</h1>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div>  
    </header>

    <nav>
        <ul class="menu">
            <li><a href="../../sistema_login/index.php">Início</a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../sobre.php">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../manutencao_acervo/index_acervo.php">Acervo</a></li>
                    <li><a href="../manutenção_emprestimos/index.php">Empréstimos</a></li>
                </ul>
            </li>
            <li><a href="../reservas/cria_reserva.php">Reservas</a></li>
            <li><a href="index.php">Relatórios</a></li>
            
        </ul>
    </nav>
    
    <div id="main">
        
        <div id="opcoes">
        </div>
        
        <div id="middle">
            
            <div id="filtro" class="solid hidden">
                <div id="filtro_container">

                </div>
                <div id="actions">
                    <div id="reset" class="solid btn">
                        Reset
                    </div>
                    <div id="aplicar" class="solid btn">
                        Aplicar
                    </div>
                </div>
            </div>
        
            <div id="resultado" class="solid">
                <div id="resultado_container">
                </div>
                <div id="resultado_actions">
                    <div id="imprimir" class="solid btn">Imprimir</div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <h3 class="rodape">© SORA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/filtros.js"></script>
    <script src="js/relator.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


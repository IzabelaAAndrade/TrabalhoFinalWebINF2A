<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/header_footer.css">
    <link rel="stylesheet" href="style/padrao.css">
    <title>Manutenção Professores</title>
</head>
<body>

    <header>
        <img src="img/sidaLogo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div> 
    </header>

    <nav>
        <ul class="menu" >
           <li><a href="../">Home</a></li>
           <li><a href="../sobre.php">Sobre</a></li>
           <li><a href="#">Manutenção</a>
               <ul class="sub_menu">
                   <li><a href="../campi/campi.php">Campi</a></li>
                   <li><a href="../manutencao_departamentos/departamentos.html">Departamentos</a></li>
                   <li><a href="../manutenção_cursos/">Cursos</a></li>
                   <li><a href="../manutancao_turmas/">Turmas</a></li>
                   <li><a href="../manutencao_alunos/">Alunos</a></li>
                   <li><a href="../manutencao_professores/">Professores</a></li>
                   <li><a href="../manutencao_disciplinas/">Disciplinas</a></li>
                   <li><a href="../manutencao_etapas/">Etapas</a></li>
                   <li><a href="../manutencao_diarios/">Diários</a></li>
               </ul>
           </li>
           <li><a href="../menu_relatorios/index.html">Relatórios</a>
               <ul class="sub_menu">
                   <li><a href="../menu_relatorios/relatorio_certificado/">Certificados</a></li>
                   <li><a href="../menu_relatorios/relatorio_historico/">Histórico por Aluno e Turma</a></li>
                   <li><a href="../menu_relatorios/relatorio_alunos/">Relação de Alunos</a></li>
                   <li><a href="../menu_relatorios/relatorio_relacao_conteudo/">Relação de Conteúdos</a></li>
                   <li><a href="../menu_relatorios/relatorio_professores/">Relação de Professores</a></li>
               </ul>
           </li>
           </li>
           <li><a href="../transferencia_alunos/">Transferências</a></li>
           <li><a href="#">Ajuda</a></li>
       </ul>
    </nav>

    <main>
        <div id="filtros" class="solid">
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
        <div id="centro">
            <div id="lista">

            </div>
            <div id="novo" class="btn solid">
                cadastrar professor
            </div>
        </div>
    </main>

    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/filtros.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

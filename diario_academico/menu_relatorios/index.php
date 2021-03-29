<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu de Relatórios | SIDA</title>
        <link rel="stylesheet" href="css_relatorios/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="sidaLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../sobre.html">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../campi/campi.php">Campi</a></li>
                        <li><a href="../manutencao_departamentos/">Departamentos</a></li>
                        <li><a href="../manutencao_cursos/index.php">Cursos</a></li>
                        <li><a href="../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../manutencao_disciplinas/">Disciplinas</a></li>
                        <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../manutencao_diarios/index.html">Diários</a></li>
                    </ul>
                </li>
                <li><a href="index.php">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="relatorio_certificado/index.php">Certificados</a></li>
                        <li><a href="relatorio_certificado/index.php">Histórico por Aluno e Turma</a></li>
                        <li><a href="relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                        <li><a href="relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                        <li><a href="manutencao_professores/index.php">Relação de Professores</a></li> 
                    </ul>
                </li>
                <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
        </nav>
        <main>
            <h3 class="sub">Bem-Vindo(a) ao</h3>
            <h1 class="principal">Menu de Relatórios</h1>
            <p class="descricao">Selecione um dos relatórios abaixo.</p>
            
            <ul id="listaRelatorios">
                <li><a href="relatorio_certificado/index.php">Certificados</a></li>
                <li><a href="relatorio_historico/index.php">Histórico por Aluno e Turma</a></li>
                <li><a href="relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                <li><a href="relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                <li><a href="relatorio_professores/index.php">Relação de Professores</a></li>

            </ul>
            
        </main>
        <footer>
            <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
    </body>
</html>
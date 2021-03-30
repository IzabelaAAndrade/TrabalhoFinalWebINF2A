<?php
    @session_start();
    include '../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu de Relatórios - Relação de Conteúdos</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_tabelas.css">
        <link rel="stylesheet" href="../css_relatorios/style_inputs_botoes.css">
        <link rel="stylesheet" href="relacao_conteudos.css">

    <title>Menu de Relatórios - Relação de Conteúdos | SIDA</title>
</head>
<body>
    <header>
        <img src="../sidaLogo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
        <div id="dados_user">
                <div id="aux">
                    <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                    <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
                </div>
                </div>
    </header>
    <nav>
        <ul class="menu">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../../sobre.html">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../../campi/campi.php">Campi</a></li>
                        <li><a href="../../manutencao_departamentos/">Departamentos</a></li>
                        <li><a href="../../manutencao_cursos/index.php">Cursos</a></li>
                        <li><a href="../../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../../manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                        <li><a href="../../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../../manutencao_diarios/index.html">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../index.php">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/index.php">Certificados</a></li>
                        <li><a href="../relatorio_certificado/index.php">Histórico por Aluno e Turma</a></li>
                        <li><a href="../relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                        <li><a href="index.php">Relação de Conteúdos</a></li>
                        <li><a href="../relatorio_professores/index.php">Relação de Professores</a></li> 
                    </ul>
                </li>
                <li><a href="../../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
    </nav>

    <main>
        <div id="cabecalho">
            <p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index.php">Relação de Conteúdos</a></p>
            <h1 class="principal">Relação de Conteúdos</h1>
        </div>
        <div id="main">
            <p id="descricao">Selecione a disciplina e a etapa para gerar  o relatório.</p>
            <div id="filtros">
                <div id="content">
                    <select id="selecionar_disciplina">
                        <option value="" selected>Selecione uma disciplina</option>
                        <?php
                            require("conexao.php");
                            $query = "SELECT * FROM disciplinas";
                            $resultado_disciplinas = mysqli_query($conexao,$query) or die();
                            
                            while($row_disciplinas = mysqli_fetch_array($resultado_disciplinas)){
                                $id_disciplina = $row_disciplinas["id"];
                                $nome_disciplina = $row_disciplinas["nome"];
                                echo "<option value='$id_disciplina'>$nome_disciplina</option>";
                            }

                        ?>
                    </select>
                    <input type="number" min="0" id="selecionar_etapa" placeholder="Ordem da etapa desejada">
                    <button id="botao-enviar">Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="control.js"></script>
    <!-- <script src="../impressao_relatorios.js"></script> -->
</body>
</html>

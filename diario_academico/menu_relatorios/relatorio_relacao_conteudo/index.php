<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório Relação de Conteúdos</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="conteudo.css">
        <link rel="stylesheet" href="../index.css">
        <style>
        	#imprimir {
        		background-color: white;
        	}
        </style>

    <title>Relação de Conteúdos</title>
</head>
<body>
    <header>
        <img src="img/LogoExemploCortado.png" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="../../diario_academico/campi/inseriCampi.html">Campi</a></li>
                    <li><a href="../../diario_academico/manutencao_departamentos/departamentos.html">Departamentos</a></li>
                    <li><a href="../../diario_academico/manutenção_cursos/index.html">Cursos</a></li>
                    <li><a href="../../manutencao_turmas/manutencao_cursos.php">Turmas</a></li>
                    <li><a href="../../diario_academico/manutencao_alunos/index.php">Alunos</a></li>
                    <li><a href="../../diario_academico/manutencao_professores/index.html">Professores</a></li>
                    <li><a href="../../diario_academico/manutencao_disciplinas/">Disciplinas</a></li>
                    <li><a href="../../diario_academico/manutencao_etapas/index.php">Etapas</a></li>
                    <li><a href="../../diario_academico/manutencao_diarios/php/inserir.php">Diários</a></li>
                </ul>
            </li>
            <li><a href="#">Relatórios</a>
                <ul class="sub_menu">
                    <li><a href="../relatorio_certificado/certificados.html">Certificados</a></li>
                    <li><a href="">Histórico por Aluno e Turma</a></li>
                    <li><a href="index.php">Relação de Conteúdos</a></li> 
                </ul>
            </li>
            <li><a href="../../diario_academico/transferencia_alunos/desliga_interface.php">Transferências</a></li>
            <li><a href="#">Ajuda</a></li>
        </ul>
    </nav>

    <main>
        <div id="cabecalho">
            <p id="endereco"><a href="../">Menu de Relatórios</a> > <a href="index.php">Relação de Conteúdos</a></p>
            <h1 class="principal">Relação de Conteúdos</h1>
        </div>
        <div id="main">
            <p id="descricao">Selecione a disciplina e/ou a etapa para gerar  o relatório.</p>
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
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="controles.js"></script>
</body>
</html>

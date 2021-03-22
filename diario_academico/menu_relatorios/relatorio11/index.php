<!--Codigo feito pelos grupos F e G e com o CSS editado pelo grupo A para servir 
como um padrao de formatacao para as interfaces de relatorio do diario academico-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="temporario.css">
    <title>Relação de Conteúdos</title>
    <style>
        #selecionar_disciplina, #selecionar_etapa{
            width: 50%;
            height: 8%;
            display: block;
            padding: 5px;
            margin-bottom: 2%;
            margin-left: 25%;
        }
        #filtros {
            max-width: 500px;
            min-height: 200px;
            margin-left: 30%;
            box-shadow: 0 0 1em lightgrey;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #main {
            display: flex;
            flex-direction: column;
        }
        #titulo-form {
            color: #e74946;
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 4%;
        }
        #botao-enviar {
            width: 12%;
            margin-left: 45%;
            text-align: center;
        }
        #resultado-pesquisa {
            text-align: center;
            color: #e74946;
            font-weight: bold;
        }
    </style>
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
                    <li><a href="#">Campi</a></li>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Turmas</a></li>
                    <li><a href="#">Alunos</a></li>
                    <li><a href="#">Professores</a></li>
                    <li><a href="#">Disciplinas</a></li>
                    <li><a href="#">Etapas</a></li>
                    <li><a href="#">Diários</a></li>
                </ul>
            </li>
            <li><a href="#">Relatórios</a></li>
            <li><a href="#">Transferências</a></li>
            <li><a href="#">Ajuda</a></li>
        </ul>
    </nav>
    
    <div id="main">
        <div id="filtros">
            <h1 id="titulo-form">Relação de Conteúdos</h1>
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

    <footer>
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="control.js"></script>
</body>
</html>

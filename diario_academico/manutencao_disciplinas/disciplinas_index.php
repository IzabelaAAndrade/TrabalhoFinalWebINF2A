<?php
include_once "povoa_base.php";
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/disciplinas_index_css.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tabela.css">
</head>
<body>
<header>
    <div id="logo-titulo">
        <img src="imagens/LogoExemploCortado.png" alt="logo" id="logo">
        <h1 id="titulo"><strong>Sistema Diário Acadêmico</strong></h1>
    </div>

    <form id="form_buscar" action="" method="get" enctype="application/x-www-form-urlencoded">
        <div class="box">
            <input name="palavra" type="text" id="txtBusca" placeholder="Buscar..."/>
            <button type="submit" id="btnBusca" value="Buscar"><i class="fas fa-search"></i></button>
        </div>
    </form>

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

<main id="main">
    <h3 class="sub"><strong>Bem-Vindo(a) à</strong></h3>
    <h1 class="principal"><strong>Manutenção Disciplinas</strong></h1>
    <p class="descricao">Para a realização das tarefas, criar, alterar e excluir disciplinas basta clicar nos seus respectivos botões -
        <br> Deseja realizar alguma manuntenção nas disciplinas do  Diário Acadêmico? Você está no lugar certo!
    </p>
    <div class="modal fade" id="adddisc" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;
                    </button>
                    <h2>Adicionar Disciplina</h2>
                </div>
                <div class="modal-body">
                    <form action="cria_disciplinas.php" method="get">
                        <select name="id_turmas" class="caixa-seleção">
                            <?php
                            $cnx = mysqli_connect("localhost", "root", "", "academico") or die("Erro de conexão!");
                            $sql = 'select * from turmas';
                            $result = mysqli_query($cnx, $sql);
                            $table = mysqli_fetch_all($result);
                            echo "<option value='-1'>ID da Turma</option>";
                            for ($i = 0; $i < count($table); $i++) {
                                echo "<option value=" . $table[$i][0] . ">" . $table[$i][0] . "</option>";
                            }
                            mysqli_close($cnx);
                            ?>
                        </select>
                        </fieldset>
                        <input class="modal_input" type="text" name="nome" placeholder="Disciplina" value="">
                        <input class="modal_input" type="number" name="min" placeholder="Carga Horária em Minutos"
                               value="">
                        <input class="botoes" type="submit" value="Cadastar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editardisc" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;
                    </button>
                    <h2>Editar Disciplina</h2>
                </div>
                <div class="modal-body" id="edita_modal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="container_msg">
        <?php
        if (!isset($_SESSION["sts"])) {
            $_SESSION["sts"] = "0";
        }
        if ($_SESSION["sts"] == "1") {
            echo "<div class='msg_succes'><p>Disciplina Cadastrada com Sucesso</p></div>";
            unset($_SESSION["sts"]);
        } else if ($_SESSION["sts"] == "2") {
            echo "<div class='msg-erro'><p>Disciplina já Cadastrada!!</p></div>";
            unset($_SESSION["sts"]);
        } else if ($_SESSION["sts"] == "3") {
            echo "<div class='msg_succes'><p>Disciplina Alterada com Sucesso</p></div>";
            unset($_SESSION["sts"]);
        } else if ($_SESSION["sts"] == "4") {
            echo "<div class='msg_succes'><p>Disciplina Apagada com Sucesso</p></div>";
            unset($_SESSION["sts"]);
        } else if ($_SESSION["sts"] == "5") {
            echo "<div class='msg-erro'><p>Espaço em Branco</p></div>";
            unset($_SESSION["sts"]);
        }
        ?>
    </div>
    <button id='btnadd' class='btnAdicionar btn btn-info btn-lg' data-toggle='modal' data-target='#adddisc'>Criar nova
        Disciplina
    </button>
    <div id="main_tab">
        <?php
        include "conexao_bd.php";
        global $conexao;
        if (isset($_GET['palavra'])) {

            if (empty($_GET['palavra'])) {
                $query = "SELECT * FROM disciplinas";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id_turmas</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Carga_horaria_min</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['id_turmas'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['carga_horaria_min'] . "</td>";
                        echo "<td><button name='btn'  class='btnAlterar'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
                        echo "<td><button name='btn' class='btnDeletar'  value = '" . $linha['id'] . "' >Deletar</button>" . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";
                }
            } else {
                $palavra = mysqli_real_escape_string($conexao, trim($_GET['palavra']));
                $query = "SELECT * FROM disciplinas WHERE id LIKE '%$palavra%' OR nome LIKE '%$palavra%'";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id_turmas</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Carga_horaria_min</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['id_turmas'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['carga_horaria_min'] . "</td>";
                        echo "<td><button type='button' class='btnAlterar' name='btn'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
                        echo "<td><button  type='button' class='btnDeletar' name='btn' value = '" . $linha['id'] . "'>Deletar</button>" . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";

                } else {
                    echo "<div id='container_msg'><div class='msg-erro'><p>Erro: Não foram encontrados nenhuma turma com essa palavra</p>" . "</div></div>";
                }
            }
            mysqli_close($conexao);
        } else {
            include "conexao_bd.php";
            global $conexao;
            if (empty($_GET['palavra'])) {
                $query = "SELECT * FROM disciplinas";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id_turmas</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Carga_horaria_min</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['id_turmas'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['carga_horaria_min'] . "</td>";
                        echo "<td><button name='btn'  class='btnAlterar'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
                        echo "<td><button name='btn' class='btnDeletar'  value = '" . $linha['id'] . "' >Deletar</button>" . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";
                }
            }
            mysqli_close($conexao);
        }
        ?>
    </div>
</main>


<footer>
    <h3><strong>© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</strong>
    </h3>
    <h3><strong>Trabalho orientado pelo professor William Geraldo Sallum</strong></h3>
</footer>
<script src="https://kit.fontawesome.com/b484666594.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/editar_excluir_disciplina.js"></script>
</body>
</html>

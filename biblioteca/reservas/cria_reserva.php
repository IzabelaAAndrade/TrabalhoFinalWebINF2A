<?php
session_start();
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/tabela.css">
</head>
<body>
<header>
    <div id="logo-titulo">
        <img src="imagens/LogoExemploCortado.png" alt="logo" id="logo">
        <h1 id="titulo"><strong>Sistema de Biblioteca</strong></h1>
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
                <li><a href="#">Acervo</a></li>
                <li><a href="#">Empréstimos</a></li>
            </ul>
        </li>
        <li><a href="#">Relatórios</a></li>
        <li><a href="#">Descarte</a></li>
        <li><a href="#">Ajuda</a></li>
    </ul>
</nav>

<main id="main">
    <h3 class="sub"><strong>Bem-Vindo(a) à</strong></h3>
    <h1 class="principal"><strong>Realização de Reservas!</strong></h1>
    <p class="descricao"> Deseja Reservar algum item de nossa biblioteca? Você está no lugar certo!
        <br>Basta clicar no botão abaixo e preencher o formulário com os dados solicitados!
    </p>
    <div class="modal fade" id="adddisc" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="cabecalho_modal">
                    <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;
                    </button>
                    <h2>Realizar Reserva</h2>
                </div>
                <div class="modal-body">
                    <form action="confirma_reservas.php" method="post">
                        <label for="selecao_reservas">Intem a ser reservado:</label>
                        <select id="selecao_reservas" name="id_itens" class="caixa-seleção">
                            <?php
                            session_start();

                            $bd = "biblioteca";
                            $user = "root";
                            $senha = "";
                            $server = "localhost";

                            // efetua conexão com o bd
                            $conexao = mysqli_connect($server, $user, $senha, $bd) or die("Houve um erro na conexão com o Banco de dados =(");

                            $lista_selecao_livos = mysqli_query($conexao, "SELECT * FROM acervo");

                            //Arrays de Dados
                            $id_acervo = array();
                            $id_campi = array();
                            $nome_livro = array();
                            $editora = array();
                            $n_paginas = array();

                            //$dados_acervo = array($id, $id_campi, $nome_livro, $editora, $n_paginas);

                            /*id - 0, id_campi - 1, nome - 2, tipo - 4, editora - 6, paginas - 7;
                            $id_campi[$i] = $linhas_tabela_livros[$i][2];
                            $nome_livro[$i] = $linhas_tabela_livros[$i][3];
                            $editora[$i] = $linhas_tabela_livros[$i][6];
                            $n_paginas[$i] = $linhas_tabela_livros[$i][7];
                            */
                            $linhas_tabela_livros = mysqli_fetch_all($lista_selecao_livos);
                            echo(var_dump($linhas_tabela_livros));
                            for ($i = 0; $i < count($linhas_tabela_livros); $i++) {
                                $id_acervo[$i] = $linhas_tabela_livros[$i][0];
                                $nome_livro[$i] = $linhas_tabela_livros[$i][2];
                                echo("<option value=\"" . $id_acervo[$i] . "\">" . $id_acervo[$i] . " - " . $nome_livro[$i] . "</option>.");
                            }
                            ?>
                        </select>
                        <label for="selecao_alunos_reservas">Reservar este item para:</label>
                        <select id="selecao_alunos_reservas" name="id_alunos" class="caixa-seleção">

                            <?php
                            $lista_selecao_alunos = mysqli_query($conexao, "SELECT * FROM alunos");
                            $linhas_tabela_alunos = mysqli_fetch_all($lista_selecao_alunos);
                            echo(var_dump($lista_selecao_alunos));
                            for ($j = 0; $j < count($linhas_tabela_alunos); $j++) {
                                echo("<option value=\"" . $linhas_tabela_alunos[$j][0] . "\">" . $linhas_tabela_alunos[$j][0] . " - " . $linhas_tabela_alunos[$j][1] . "</option>.");
                            }
                            ?>
                        </select>

                        <label for="dt_reserva">Data de Reserva: </label>
                        <input class="input" type="date" name="estimativa_reserva" value=""/>
                        <div class="botoes">
                            <button type="submit" class="btn btn-default" id="btn_1" onclick="location.reload(true);">
                                Confirmar
                            </button>
                            <button type="button" class="btn btn-default" id="btn_2" data-dismiss="modal"
                                    onclick="location.reload(true);">
                                Cancelar
                            </button>

                        </div>
                    </form>
                    <!--<input class="btn btn-default" id="btn_1" type="submit" value="Cadastar">-->

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    </div>
    <button id='btnadd' class='btnAdicionar btn btn-info btn-lg' data-toggle='modal' data-target='#adddisc'> Criar
        Reserva
    </button>

    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;
                    </button>
                    <h2>Editar Reservas</h2>
                </div>
                <div class="modal-body" id="altera_modal">
                <p>Testeeeeee</p>
                <input type="text" name="teste" id="teste">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_deletar" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="location.reload(true);">&times;
                    </button>
                    <h2>Deletar Reservas</h2>
                </div>
                <div class="modal-body" id="deleta_modal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload(true);">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="main_tab">
        <div id="container_msg">
            <?php

            if (isset($_SESSION['confirma'])) {
                if ($_SESSION['confirma'] == 1) {
                    echo "<div class='msg-erro'><p>Este aluno já possui reservas! Não é possível reservar este Livro.</p></div>";
                } else if ($_SESSION['confirma'] == 2) {
                    echo "<div class='msg-data'><p>Este livro já está reservado. Reservas Disponíveis a partir do dia " . $_GET['data'] . "</p></div>";
                } else if ($_SESSION['confirma'] == 3) {
                    echo "<div class='msg_succes'><p>Reserva Concluída com Sucesso!!.</p></div>";
                }
                if ($_SESSION['confirma'] == 4) {
                    echo "<div class='msg-erro'><p>Por favor, preencha todos os campos!</p></div>";
                }
                unset($_SESSION['confirma']);
            }
            ?>
        </div>
        <?php
        $bd = "biblioteca";
        $user = "root";
        $senha = "";
        $server = "localhost";
        $conexao = mysqli_connect($server, $user, $senha, $bd) or die("Houve um erro na conexão com o Banco de dados =(");
        if (isset($_GET['palavra'])) {
            if (empty($_GET['palavra'])) {
                $query = "SELECT * FROM reservas";
                $query_nome = "SELECT * FROM alunos";
                $query_itens = "SELECT * FROM acervo";
                $result = mysqli_query($conexao, $query);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id Alunos</th>";
                    echo "<th>Id Acervo</th>";
                    echo "<th>Data Reserva</th>";
                    echo "<th>Tempo Espera</th>";
                    echo "<th>Empréstimo Realizado</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        $result_nome = mysqli_query($conexao, $query_nome);
                        while ($tt = mysqli_fetch_assoc($result_nome)) {
                            if ($linha['id_alunos'] == $tt['id']) {
                                echo "<td>" . $linha['id_alunos'] . " - " . $tt['nome'] . "</td>";
                                break;
                            }
                        }
                        $result_itens = mysqli_query($conexao, $query_itens);
                        while ($linha_itens = mysqli_fetch_assoc($result_itens)) {
                            if ($linha['id_acervo'] == $linha_itens['id']) {
                                echo "<td>" . $linha['id_acervo'] . " - " . $linha_itens['nome'] . "</td>";
                                break;
                            }
                        }

                        echo "<td>" . $linha['data_reserva'] . "</td>";
                        echo "<td>" . $linha['tempo_espera'] . "</td>";
                        echo "<td>" . $linha['emprestou'] . "</td>";
                        echo "<td><button name='btn'  class='btnAlterar'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
                        echo "<td><button name='btn' class='btnDeletar'  value = '" . $linha['id'] . "' >Deletar</button>" . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";
                }
            } else {
                $palavra = mysqli_real_escape_string($conexao, trim($_GET['palavra']));
                $query = "SELECT * FROM reservas WHERE tempo_espera LIKE '%$palavra%'";
                $query_nome = "SELECT * FROM alunos";
                $query_itens = "SELECT * FROM acervo";
                $result = mysqli_query($conexao, $query);
                $result_nome = mysqli_query($conexao, $query_nome);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id Alunos</th>";
                    echo "<th>Id Acervo</th>";
                    echo "<th>Data Reserva</th>";
                    echo "<th>Tempo Espera</th>";
                    echo "<th>Empréstimo Realizado</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        $result_nome = mysqli_query($conexao, $query_nome);
                        while ($tt = mysqli_fetch_assoc($result_nome)) {
                            if ($linha['id_alunos'] == $tt['id']) {
                                echo "<td>" . $linha['id_alunos'] . " - " . $tt['nome'] . "</td>";
                                break;
                            }
                        }
                        $result_itens = mysqli_query($conexao, $query_itens);
                        while ($linha_itens = mysqli_fetch_assoc($result_itens)) {
                            if ($linha['id_acervo'] == $linha_itens['id']) {
                                echo "<td>" . $linha['id_acervo'] . " - " . $linha_itens['nome'] . "</td>";
                                break;
                            }
                        }
                        echo "<td>" . $linha['data_reserva'] . "</td>";
                        echo "<td>" . $linha['tempo_espera'] . "</td>";
                        echo "<td>" . $linha['emprestou'] . "</td>";
                        echo "<td><button name='btn'  class='btnAlterar'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
                        echo "<td><button name='btn' class='btnDeletar'  value = '" . $linha['id'] . "' >Deletar</button>" . "</td>";

                        echo "</tr>";
                    }

                    echo "</tbody>";

                    echo "</table>";

                } else {
                    echo "<div id='container_msg'><div class='msg-erro'><p>Erro: Não foram encontrados nenhuma reserva com essa palavra</p>" . "</div></div>";
                }
            }
            mysqli_close($conexao);
        } else {
            $bd = "biblioteca";
            $user = "root";
            $senha = "";
            $server = "localhost";
            $conexao = mysqli_connect($server, $user, $senha, $bd) or die("Houve um erro na conexão com o Banco de dados =(");
            if (empty($_GET['palavra'])) {
                $query = "SELECT * FROM reservas";
                $query_nome = "SELECT * FROM alunos";
                $query_itens = "SELECT * FROM acervo";
                $result = mysqli_query($conexao, $query);
                $result_nome = mysqli_query($conexao, $query_nome);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo "<table id='tabela'>";

                    echo "<thead>";

                    echo "<tr>";

                    echo "<th>Id</th>";
                    echo "<th>Id Alunos</th>";
                    echo "<th>Id Acervo</th>";
                    echo "<th>Data Reserva</th>";
                    echo "<th>Tempo Espera</th>";
                    echo "<th>Empréstimo Realizado</th>";
                    echo "<th></th>";
                    echo "<th></th>";

                    echo "</tr>";

                    echo "</thead>";

                    echo "<tbody>";


                    while ($linha = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        $result_nome = mysqli_query($conexao, $query_nome);
                        while ($tt = mysqli_fetch_assoc($result_nome)) {
                            if ($linha['id_alunos'] == $tt['id']) {
                                echo "<td>" . $linha['id_alunos'] . " - " . $tt['nome'] . "</td>";
                                break;
                            }
                        }
                        $result_itens = mysqli_query($conexao, $query_itens);
                        while ($linha_itens = mysqli_fetch_assoc($result_itens)) {
                            if ($linha['id_acervo'] == $linha_itens['id']) {
                                echo "<td>" . $linha['id_acervo'] . " - " . $linha_itens['nome'] . "</td>";
                                break;
                            }
                        }
                        echo "<td>" . $linha['data_reserva'] . "</td>";
                        echo "<td>" . $linha['tempo_espera'] . "</td>";
                        echo "<td>" . $linha['emprestou'] . "</td>";
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

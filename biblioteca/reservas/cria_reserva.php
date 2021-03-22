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
                    <form action="cria_disciplinas.php" method="get">
                        <label for="selecao_reservas">Intem a ser reservado:</label>
                        <select id="selecao_reservas" name="id_turmas" class="caixa-seleção">
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
                              for($i=0; $i<count($linhas_tabela_livros); $i++){
                                  $id_acervo[$i] = $linhas_tabela_livros[$i][0];
                                  $nome_livro[$i] = $linhas_tabela_livros[$i][2];
                                  echo("<option value=\"0\">". $id_acervo[$i] ." - ". $nome_livro[$i] ."</option>.");
                              }
                           ?>
                        </select>
                        <label for="selecao_alunos_reservas">Reservar este item para:</label>
                        <select id="selecao_alunos_reservas" name="id_alunos" class="caixa-seleção">
                    
                            <?php
                                $lista_selecao_alunos = mysqli_query($conexao, "SELECT * FROM alunos");
                                $linhas_tabela_alunos = mysqli_fetch_all($lista_selecao_alunos);
                                echo(var_dump($lista_selecao_alunos));
                                for($j=0; $j<count($linhas_tabela_alunos); $j++){
                                    echo("<option value=\"0\">". $linhas_tabela_alunos[$j][0] ." - ". $linhas_tabela_alunos[$j][1]."</option>.");
                                }
                            ?>
                        </select>

                        <label for="dt_reserva">Data de Reserva: </label>
                        <input class="input" type="date" name="estimativa_reserva" placeholder="Disciplina" value=""/>
                        <!--<input class="btn btn-default" id="btn_1" type="submit" value="Cadastar">-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btn_1" data-dismiss="modal" onclick="location.reload(true);">
                        Confirmar
                    </button>
                    <button type="button" class="btn btn-default" id="btn_2" data-dismiss="modal" onclick="location.reload(true);">
                        Cancelar
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
        
        ?>
    </div>
    <button id='btnadd' class='btnAdicionar btn btn-info btn-lg' data-toggle='modal' data-target='#adddisc'> Criar Reserva
    </button>
    <div id="main_tab">
        
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


<?php

?>

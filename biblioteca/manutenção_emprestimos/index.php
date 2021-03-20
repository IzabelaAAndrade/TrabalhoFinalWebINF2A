<?php
    if (isset($_GET["id_aluno"])) {
        /*CONEXÃO COM BANCO DE DADOS*/
        $user = "root";
        $password = "";
        $database = "biblioteca";
        $hostname = "localhost";
        $conexao = mysqli_connect( $hostname, $user, $password) or die ("Erro na conexão."); 
        $query = "USE $database";
        $query_database = mysqli_query($conexao, $query);

        $id_aluno = $_GET["id_aluno"];

        if(!empty($id_aluno)){
            $query = "SELECT `id`,`nome` FROM `alunos` WHERE `id` = $id_aluno";
            $result = mysqli_query($conexao, $query);
            $cont = mysqli_num_rows($result);

            if($cont>0){
                $row = mysqli_fetch_assoc($result);
                $return = $row['id'].":".$row['nome'];

                mysqli_free_result($result);

                $query = "SELECT * FROM `emprestimos` WHERE `Id_alunos` = $id_aluno";
                $result = mysqli_query($conexao, $query);
                $cont = mysqli_num_rows($result);
                
                if($result != false){
                    $returnEmprestimos = "";
                    while($row = mysqli_fetch_assoc($result)){
                        /*echo "<div class='emprestimo'>ID: ".$row['Id']."<br>ID do Acervo: ".$row['id_acervo']."<br>Data de Empréstimo: ".$row['data_emprestimo']."<br>Data prevista para Devolução: ".$row['data_devolucao']."</div>";*/
                        $returnEmprestimos .= $row['Id'].",".$row['id_alunos'].",".$row['id_acervo'].",".$row['data_emprestimo'].",".$row['data_prev_devol'].",".$row['data_devolucao'].",".$row['multa'].",";
                    }
                }else{
                    $returnEmprestimos = "Nenhum empréstimo.";
                }
                    
                $returnRows = $cont;
                mysqli_free_result($result);
            }else{
                $return = "";
                $returnEmprestimos = "";
                $returnRows = 0;
            }
        }
        mysqli_close($conexao);

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" href="geral_biblioteca.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: unset !important;
        }
        h1, h2, h3, h4 {
            font-weight: bold !important;
            line-height: 1.5 !important;
        }
    </style>
    <title>Empréstimos</title>
</head>
<body>
    <header>
        <img src="img/LogoExemploCortada.png" alt="logo" id="logo">
        <h1>Sistema Biblioteca</h1>
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

    <main>
        <div id="cabecalho">
            <div id="cab">
                <h3 class="sub">Bem-Vindo(a) à</h3>
                <h1 class="principal">Manutenção de Empréstimos</h1>
                <div id="busca">
                    <input type="text"  name="id_aluno" placeholder="ID do aluno" id="busca_id"><button type="submit"  id="botaoBuscaId"><img src="lupa.png" width="24" height="24"></button>
                </div>
            </div>
        </div>

        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" id="novo_emprestimo">Novo Empréstimo</button>

        <div id="emprestimos"></div>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="cabecalho_modal">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Empréstimos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
              </div>
              <div class="modal-body">
                <div class="campos">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="col-form-label"></label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="inputs" id="id_aluno" class="form-control" aria-describedby="passwordHelpInline" placeholder="ID do aluno">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                
                            </span>
                        </div>
                    </div>
                </div>

                <div class="campos">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="col-form-label"></label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="inputs"id="id_acervo" class="form-control" aria-describedby="passwordHelpInline" placeholder="ID do acervo">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                
                            </span>
                        </div>
                    </div>
                </div>

                <div id="status"></div>

              </div>
              <div class="modal-footer" id="footer_modal">
                <button type="button" class="btn " id="confirmar" disabled>Confirmar</button>
                <button type="button" class="btn" id="cancelar" disabled>Cancelar</button>
              </div>
            </div>
          </div>
        </div>
    </main>
    <footer>
        <h3>Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019©</h3>
    </footer>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>
    <script src="dom.js"></script>
    <script>
        function makeRequest_MostraEmprestimos(){
            $.ajax({
            url : "mostra_emprestimos.php",
            type : 'post',
            data : {
                id_aluno : $("#busca_id").val(),
            },
            beforeSend : function(){
                $("#emprestimos").html("Carregando...");
            }})
            .done(function(msg){
                $("#emprestimos").html(msg);
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });
        }

        document.getElementById("botaoBuscaId").onclick = function(e){
            makeRequest_MostraEmprestimos();
        }
    </script>
</body>
</html>

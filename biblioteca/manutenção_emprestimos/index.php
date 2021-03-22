<?php
    if (isset($_GET["id_aluno"])) {
        /*CONEXÃO COM BANCO DE DADOS*/
        include 'conexao.php';

        $id_aluno = $_GET["id_aluno"];

        if(!empty($id_aluno)){
            $query = "SELECT `id`,`nome` FROM `alunos` WHERE `id` = $id_aluno";
            $result = mysqli_query($conexao, $query);
            $cont = mysqli_num_rows($result);

            if($cont>0){
                $row = mysqli_fetch_assoc($result);
                $return = $row['id'].":".$row['nome'];

                mysqli_free_result($result);

                $query = "SELECT * FROM `emprestimos` WHERE `Id_alunos` = $id_aluno AND `Data_devolucao` IS NULL";
                $result = mysqli_query($conexao, $query);
                $cont = mysqli_num_rows($result);
                
                if($result != false){
                    $returnEmprestimos = "";
                    while($row = mysqli_fetch_assoc($result)){
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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/geral_biblioteca.css">
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
        #barraPesquisa {
        	height: 100%;
        }
    </style>
    <title>Empréstimos</title>
</head>
<body>
    <header>
        <img src="img/LogoExemploCortada.png" alt="logo" id="logo">
        <h1 id="titulo">Sistema Biblioteca</h1>
    </header>
    <nav>
            <ul class="menu">
                <li><a href="../../biblioteca/index.html">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../manutencao_acervo/index_acervo.html">Acervo</a></li>
                        <li><a href="index.php">Empréstimos</a></li>
                    </ul>
                </li>
                <li><a href="#">Relatórios</a></li>
                <li><a href="../menu_relatorios/relacao_descartes.php">Descarte</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
    <main>
        <div id="cabecalho" class="ajuste_z_index">
            <div id="cab">
                <h3 class="sub">Bem-Vindo(a) à</h3>
                <h1 class="principal">Manutenção de Empréstimos</h1>
                <div id="busca">
                    <form method="GET" action="" id="barraPesquisa">
                        <input type="text"  name="id_aluno" placeholder="ID do aluno" id="busca_id"><button type="submit" id="botaoBuscaId">Buscar</button>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" id="novo_emprestimo">Novo Empréstimo</button>
          
        <div id="dadosAluno"></div>
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

        <div class="modal fade" id="devolucaoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" id="cabecalho_modal">
                <h5 class="modal-title" id="exampleModalLabel">Devolução</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload(true);"></button>
              </div>
              <div class="modal-body">
                
                <p>ID do empréstimo: <span id="pIdEmprestimo"></span></p>
                <p>Data prevista para devolução: <span  id="pDataPrevDevolucao"></span></p>
                <p>Multa: <span id="pMulta"></span></p>

                <p id="result"></p>

              </div>
              <div class="modal-footer" id="footer_modal">
                <button type="button" class="btn " id="confirmaDevolucao">Confirmar</button>
                <button type="button" class="btn" id="cancelarDevolucao" onclick="location.reload(true);">Cancelar</button>
              </div>
            </div>
          </div>
        </div>

    </main>
    <footer>
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/dom.js"></script>
    <script>
        localStorage.setItem("dadosAluno", "<?php echo $return; ?>");
        localStorage.setItem("dadosEmprestimos", "<?php echo $returnEmprestimos; ?>");
        localStorage.setItem("numEmprestimos", "<?php echo $returnRows; ?>");
    </script>
    <script src="js/mostra_emprestimos.js"></script>
    <script src="js/ajax_devolucao.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção de Cursos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="css/bootstrap.min.css" />
    	<link rel="stylesheet" href="../../padrao_estilizacao/diario_academico/paginas_acao_bd/geral_academico.css">
        <link rel="stylesheet" href="manutencao_cursos.css">
        <link rel="stylesheet" href="../index_diario.css">
    	<script src="js/jquery-3.6.0.min.js"></script>
        <style>
            legend {
                float: none;
                width: auto;
                padding: inherit;
                margin-bottom: auto;
                font-size: auto;
                line-height: auto;
            }
            fieldset {
                min-width: inherit;
                padding: revert;
            }
            h1, h2, h3, h4, h5, h6 {
                margin-top: 0;
                margin-bottom: .5rem;
                font-weight: bold !important;
                line-height: 1.2;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="../../imgs/sidaLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header>
        <nav>
        <ul class="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../sobre.html">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../campi/campi.php">Campi</a></li>
                        <li><a href="../manutencao_departamentos/index.html">Departamentos</a></li>
                        <li><a href="../manutencao_cursos/index.php">Cursos</a></li>
                        <li><a href="../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../manutencao_professores/index.html">Professores</a></li>
                        <li><a href="../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                        <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../manutencao_diarios/index.html">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../menu_relatorios/index.html">Relatórios</a>
                <ul class="sub_menu">
                    <li><a href="../menu_relatorios/relatorio_certificado/certificados.html">Certificados</a></li>
                    <li><a href="../menu_relatorios/relatorio_historico/index.html">Histórico por Aluno e Turma</a></li>
                    <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.html">Relação de Alunos</a></li>
                    <li><a href="../menu_relatorios/relatorio_relacao_conteudos/index.php">Relação de Conteúdos</a></li>
                    <li><a href="../menu_relatorios/relatorio_professores/index.html">Relação de Professores</a></li>
                </ul>
                </li>
                </li>
                <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
        </nav>
        
        <main id="principal">
            <h3 class="sub">Bem-Vindo(a) à</h3>
            <h1 class="principal">Manutenção de Cursos</h1>
            <p class="descricao">Deseja inserir, alterar ou excluir algum curso? Para isso basta selecionar uma das opções abaixo!</p>

                <fieldset id="fieldset">
                    <legend>Selecione ação deseja realizar</legend>
                    <select class="caixa-seleção" id="op">
                        <option value="Inserção">Inserir</option>
                        <option value="alteração">Alterar</option>
                        <option value="exclusão">Excluir</option>
                    </select> 
                    <input class="botao" type="submit" value="enviar" id="btn">
                </fieldset>
        </main>

		<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="modal">
		  <div class="modal-dialog modal-xl">
		    <div class="modal-content">
		    	<div id="listagem">
        		</div>
		    </div>
		  </div>
		</div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Cursos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close2"></button>
              </div>
              <div class="modal-body">
                <div class="campos">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="col-form-label"></label>
                        </div>
                        <div class="col-auto">
                            <select id="id_departamento">
                                <option value="" selected>Selecione o departamento</option>
                                <?php
                                    require("conexao.php");
                                    $query = "SELECT * FROM depto";
                                    $resultado_departamentos = mysqli_query($conexao,$query) or die();
                                    
                                    while($row_departamentos = mysqli_fetch_array($resultado_departamentos)){
                                        $id_departamento = $row_departamentos["id"];
                                        echo $id_departamento;
                                        $nome_departamento = $row_departamentos["nome"];
                                        echo "<option value='$id_departamento'>$id_departamento - $nome_departamento</option>";
                                    }
        
                                ?>
                            </select>
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
                            <input type="text" id="nome" class="inputs-cadastro" aria-describedby="passwordHelpInline" placeholder="Nome">
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
                            <input type="text" id="total_horas" class="inputs-cadastro" aria-describedby="passwordHelpInline" placeholder="Total de horas">
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
                            <input type="text" id="modalidade" class="inputs-cadastro" aria-describedby="passwordHelpInline" placeholder="Modalidade">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                
                            </span>
                        </div>
                    </div>
                </div>

                <div id="status"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" id="confirmar" disabled>Confirmar</button>
                <button type="button" class="btn btn-outline-danger" id="cancelar" disabled>Cancelar</button>
              </div>
            </div>
          </div>
        </div>
        
        <footer>
            <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script src="controle.js"></script>
        <script src="inserir_curso_ajax.js"></script>
        <script src="dom.js"></script>
    </body>
</html>

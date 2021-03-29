<?php

   include '../lib/conexao.php';

   $sql = "SELECT id, nome FROM cursos";      
   $resultado = mysqli_query($conexao, $sql);
   $num_rows = mysqli_num_rows($resultado);
   $cursos = [];

   if($num_rows > 0){
      while($row = mysqli_fetch_array($resultado)){
         $cursos += array($row["nome"] => "<li class='curso'><a href=exibir_turmas.php?id=".$row["id"].">Turmas de ".$row["nome"]."</a></li>");
      }
      ksort($cursos);

   }else{
      $cursoContent = "Não há nenhum curso cadastrado.";
   }
   mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style_turmas.css">
   <link rel = "stylesheet" href = "css/index.css">
   <link rel = "stylesheet" href = "css/style_tabelas.css">
   <title>Turmas | SIDA</title>
</head>
<body>
   <header>
      <img src="../img/LogoExemploCortado.png" alt="logo" id="logo">
      <h1 id="titulo">Sistema Academico</h1>
      <div id="divBuscaTurma">
   </div>
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
               <li><a href="index.php">Turmas</a></li>
               <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
               <li><a href="../manutencao_professores/index.html">Professores</a></li>
               <li><a href="../manutencao_disciplinas/">Disciplinas</a></li>
               <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
               <li><a href="../manutencao_diarios/index.html">Diários</a></li>
            </ul>
         </li>
         <li><a href="../menu_relatorios/index.html">Relatórios</a>
            <ul class="sub_menu">
               <li><a href="../menu_relatorios/relatorio_certificado/index.html">Certificados</a></li>
               <li><a href="../menu_relatorios/relatorio_certificado/index.html">Histórico por Aluno e Turma</a></li>
               <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.html">Relação de Alunos</a></li>
               <li><a href="../menu_relatorios/relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
               <li><a href="../menu_relatorios/manutencao_professores/index.html">Relação de Professores</a></li> 
            </ul>
         </li>
         <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
      </ul>
   </nav>
<main>
   <div>
      <h3 class="sub">Bem-vindo(a) à</h3>
      <h1 class="principal">Manutenção de Turmas</h1>
      <p id="pExibicao">Selecione o curso para vizualizar suas respectivas turmas</p>
      <p id="pExibicao">ou</p>
      <form name="form" id="formBusca"  method="POST" enctype="application/x-www-form-urlencoded" action="search_turmas.php">
         <input type="text" id="inputBusca" name="busca" placeholder="Busque pelo nome/id da turma"><input type="submit" name="btnBusca" id="btnBusca" class='btn btn-info btn-lg' data-toggle='modal' data-target='#buscaTurmaModal' value="Buscar">
      </form>
   </div>

   <div id="listaCursos">
      <ul>
      <?php
         if(sizeof($cursos)>0){
            foreach ($cursos as $key => $val) {
             echo  $val; 
            }
         }else{
            $cursoContent;
         }
      ?>
      </ul>
   </div>

   <div class="modal fade" id="buscaTurmaModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h1 class="h2Simples" >Resultado da pesquisa</h1>      
            </div>
            <div class="divTabela modal-body">
            </div>
         </div>
      </div>
   </div> 

   <div class="modal fade" id="alterarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="reloadBusca();">&times;</button>
            <h2 class="h2Simples">Alterar turma</h2>
        </div>
        <form name="form" id="formAlterar"  method="POST" enctype="application/x-www-form-urlencoded" action="alterar_turma.php">
          <div class="modal-body">
            <p id="msgAlterar">Preencha apenas os dados que deseja alterar</p>
            <p><input class="inputEditar"  type="text" name="nomeTurma" placeholder="Novo Nome"></p>
            <p><input class="inputEditar" type="text" name="idCurso" placeholder="Novo ID do Curso"></p>
            <p class="result" id="resultA"></p>
          </div>
          <div class="modal-footer">
            <input class="botoes" type="submit" value="Confirmar">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="deletarTurmaModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="reloadBusca();limpaResult();">&times;</button>
            <h2 class="h2Simples">Deletar turma</h2>
        </div>
        <div class="modal-body">
          <p id="msgDeletar">Deseja deletar a turma <span id="nomeTurmaD"></span> [ID <span id="idTurmaD"></span>]?</p>
          <p class="result" id="resultD"></p>
        </div>
        <div class="modal-footer">
        <input  class="botoes" type="button" id="confirmaDeletar" value="Confirmar">
        </div>
      </div>
    </div>
    </div>
  <br>
</main>
<footer>
   <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
   <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
</footer>  

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>              
   <script>
      function reloadBusca(){
         let ajax = new XMLHttpRequest();
         let params = "busca="+document.getElementsByName('busca')[0].value;
         ajax.open('POST', 'search_turmas.php');
         ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
         ajax.onreadystatechange = function(){
            if(ajax.status===200 && ajax.readyState===4){
                  let result = document.querySelector("#buscaTurmaModal .divTabela");
                  result.innerHTML = ajax.responseText;
            }
         }
         ajax.send(params);
      }
      function limpaResult(){
         document.querySelector("#resultD").innerHTML = "";
         document.querySelector("#resultA").innerHTML = "";
      }
   </script>
   <script src="js/ajax_alterar_turma.js"></script>
   <script src="js/ajax_deletar_turma.js"></script>
   <script src="js/handler_deletar_turma_v2.js"></script>
   <script src="js/ajax_busca_turma.js"></script>                  
</body>
</html>

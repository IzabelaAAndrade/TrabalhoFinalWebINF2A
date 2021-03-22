<?php
   include "conexao.php";
   global $connection;

   $sql = "SELECT id, nome FROM cursos";
      
   $resultado = mysqli_query($connection, $sql);
   $num_rows = mysqli_num_rows($resultado);

   if($num_rows > 0){
      $cursos = [];
      while($row = mysqli_fetch_array($resultado)){
         $cursos += array($row["nome"] => "<p id='curso'><a href=exibir_turmas.php?id=".$row["id"].">Turmas de ".$row["nome"]."</a><p>");
      }
   }else{
      $cursoContent = "Não há nenhum curso cadastrado.";
   }

   ksort($cursos);

   mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style_turmas.css">
   <title>Manutenção de Turmas</title>
</head>
<body>
   <div id="divBuscaTurma">
      <form name="form" id="formBusca"  method="POST" enctype="application/x-www-form-urlencoded" action="search_turmas.php">
         <input type="text" name="busca" placeholder="Insira o nome/id da turma">
         <input type="submit" name="btnBusca" id="btnBusca" class='btn btn-info btn-lg' data-toggle='modal' data-target='#buscaTurmaModal' value="Buscar">
      </form>
   </div>

   <div>
      <h3 class="sub">Bem-vindo(a) à</h3>
      <h1 class="principal">Manutenção de Turmas</h1>
      <p>Selecione o curso para vizualizar suas respectivas turmas</p>
   </div>

   <div>
      <?php
         if(sizeof($cursos)>0){
            foreach ($cursos as $key => $val) {
               echo $val;
            }
         }else{
            $cursoContent;
         }
      ?>
   </div>

   <div class="modal fade" id="buscaTurmaModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h1>Resultado da pesquisa</h1>      
            </div>
            <div id="resultadoBusca" class="modal-body">
            </div>
         </div>
      </div>
   </div> 

   <div class="modal fade" id="deletarTurmaModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" onclick="reloadBusca();">&times;</button>
                  <h2>Deletar turma</h2>
            </div>
            <div class="modal-body">
               <p>Deseja deletar esta turma?</p>
               <p>ID da turma: <span id="idTurmaD"></span></p>
               <p>Nome da Turma: <span id="nomeTurmaD"></span></p>
               <p id="resultD"></p>
            </div>
            <div class="modal-footer">
               <input type="button" id="confirmaDeletar" value="Confirmar">
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="alterarTurmaModal" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" onclick="reloadBusca();">&times;</button>
               <h2>Alterar turma</h2>
               <p>Preencha apenas os dados que deseja alterar</p>
            </div>
            <div class="modal-body">
               <form name="form" id="formAlterar"  method="POST" enctype="application/x-www-form-urlencoded" action="alterar_turma.php">
                  <p>Nome da Turma:<input type="text" name="nomeTurma"></p>
                  <p>ID do Curso:<input type="text" name="idCurso"></p>
                  <p id="resultA"></p>
                  <div class="modal-footer">
                  <input type="submit" value="Confirmar">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>              
   <script src="js/ajax_alterar_turma.js"></script>
   <script src="js/ajax_deletar_turma.js"></script>
   <script src="js/handler_deletar_turma.js"></script>
   <script src="js/ajax_busca_turma.js"></script>
   <script>
      function reloadBusca(){
         let ajax = new XMLHttpRequest();
         let params = "busca="+document.getElementsByName('busca')[0].value;
         ajax.open('POST', 'search_turmas.php');
         ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
         ajax.onreadystatechange = function(){
            if(ajax.status===200 && ajax.readyState===4){
                  let result = document.querySelector("#resultadoBusca");
                  result.innerHTML = ajax.responseText;
                  console.log(ajax.responseText);

            }
         }
         ajax.send(params);
      }
   </script>            
</body>
</html>

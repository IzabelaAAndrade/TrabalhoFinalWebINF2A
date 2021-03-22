<?php
require_once 'dados_cnx.php';
require_once 'presenca_existe.php';

global $cnx;

$faltando = [];

$id_conteudos = verificaFaltando('id_conteudos', 'id do conteúdo');
$id_matriculas = verificaFaltando('id_matriculas', 'matrícula do aluno');
$id_atividades = verificaFaltando('id_atividades', 'id da atividade');
$faltas = verificaFaltando('faltas', 'quantidade de faltas');
$nota = verificaFaltando('nota', 'nota');

if(empty($faltando)){
  $existe = presenca_existe($cnx, $id_conteudos, $id_matriculas, $id_atividades);

  if ($existe === true) {

    //executa a exclusão
    $delete = "DELETE FROM diario 
        WHERE (`id_conteudos`,`id_matriculas`,`id_atividades`,`faltas`,`nota`) = 
              ($id_conteudos, $id_matriculas, $id_atividades, $faltas, $nota)";
    $result_del = mysqli_query($cnx, $delete);

    if ($result_del) {
      //se funcionou, avisa que deu certo
      http_response_code(200);
      echo "Registro removido com sucesso.";

    } else {
      //se não, manda erro 500 pq deu ruim
      enviar_erro_500();
    }
  } else if ($existe === false) {
    //Registro não existe, não tem como deletar
    http_response_code(404);
    echo "Esse registro não existe.";
  } else {
    //deu ruim na verificação (retornou null), manda erro 500
    enviar_erro_500();
  }
}else{
  http_response_code(400);
  echo "Parâmetros obrigatórios faltando: " . implode(', ', $faltando);
}

function verificaFaltando($var, $str){
  global $cnx, $faltando;
  $valor = '';

  if (!empty($_GET[$var]) && trim($_GET[$var])) {
    $valor = mysqli_real_escape_string($cnx, trim($_GET[$var]));
  } else {
    array_push($faltando, $str);
  }

  return $valor;
}
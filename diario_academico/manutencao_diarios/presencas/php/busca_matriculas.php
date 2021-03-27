<?php
require_once 'dados_cnx.php';
require_once 'funcoes.php';

global $cnx;

$faltando = [];

$id_conteudos = verificaFaltando('id_conteudos', 'id do conteúdo');
$id_atividades = verificaFaltando('id_atividades', 'id da atividade');

if (empty($faltando)) {
  $existe = false;
  $result = null;
  $select_conteudo = "SELECT `id_disciplinas` FROM `conteudos` WHERE `id` = $id_conteudos";
  $select_atividade = "SELECT `id_disciplinas` FROM `atividades` WHERE `id` = $id_atividades";

  $result_conteudo = mysqli_query($cnx, $select_conteudo);

  if($result_conteudo !== false){
    $existe = true;
    $result = $result_conteudo;

  }else{
    $result_atividade = mysqli_query($cnx, $select_atividade);

    if($result_atividade !== false){
      $existe = true;
      $result = $result_atividade;

    }
  }

  $result = mysqli_fetch_row($result)[0];

  if ($existe === true) {

    $select = "SELECT `id` FROM `matriculas` WHERE (`id_disciplinas`) = ($result) ORDER BY `id`";
    $result_sel = mysqli_query($cnx, $select);

    if($result_sel !== false){
      http_response_code(200);
      $registros = mysqli_fetch_all($result_sel, MYSQLI_NUM);
      echo json_encode($registros);
    }else{
      http_response_code(404);
      echo "Não foi possível encontrar alunos cadastrados a esse conteúdo e atividade..";
    }
  } else {
    http_response_code(404);
    echo "Esse registro não existe.";
  }
} else {
  http_response_code(400);
  echo "Parâmetros obrigatórios faltando: " . implode(', ', $faltando);
}

function verificaFaltando($var, $str){
  global $cnx, $faltando;
  $valor = '';

  if (!empty($_POST[$var]) && trim($_POST[$var])) {
    $valor = mysqli_real_escape_string($cnx, trim($_POST[$var]));
  } else {
    array_push($faltando, $str);
  }

  return $valor;
}

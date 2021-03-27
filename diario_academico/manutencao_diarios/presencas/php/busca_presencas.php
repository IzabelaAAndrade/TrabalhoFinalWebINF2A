<?php
require_once 'dados_cnx.php';
require_once 'funcoes.php';

global $cnx;

$faltando = [];

$id_conteudos = verificaFaltando('id_conteudos', 'id do conteúdo');
$id_atividades = verificaFaltando('id_atividades', 'id da atividade');

if (empty($faltando)) {
  $existe = presencas_existem($cnx, $id_conteudos, $id_atividades);

  if ($existe === true) {
    $select = "SELECT * FROM `diario` WHERE (`id_conteudos`,`id_atividades`) = ($id_conteudos, $id_atividades)";
    $result_sel = mysqli_query($cnx, $select);

    if ($result_sel !== false) {
      http_response_code(200);
      $registros = mysqli_fetch_all($result_sel, MYSQLI_ASSOC);
      echo json_encode($registros);
    } else {
      http_response_code(500);
      echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
    }
  } elseif ($existe === false) {
    http_response_code(404);
    echo "Esse registro não existe.";
  } else {
    //deu ruim na verificação (retornou null), manda erro 500
    enviar_erro_500();
  }
} else {
  http_response_code(400);
  echo "Parâmetros obrigatórios faltando: " . implode(', ', $faltando);
}

function verificaFaltando($var, $str)
{
  global $cnx, $faltando;
  $valor = '';

  if (!empty($_POST[$var]) && trim($_POST[$var])) {
    $valor = mysqli_real_escape_string($cnx, trim($_POST[$var]));
  } else {
    array_push($faltando, $str);
  }

  return $valor;
}

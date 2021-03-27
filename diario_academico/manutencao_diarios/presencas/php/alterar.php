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
    $id_matriculas = $_POST['id_matriculas'];
    $faltas = $_POST['faltas'];
    $notas = $_POST['nota'];

    $alunos = [];
    $resultados = true;

    for ($i = 0; $i < count($id_matriculas); $i++) {
      $alunos[$id_matriculas[$i]] = [
        trataParametro($cnx, $faltas[$i]), trataParametro($cnx, $notas[$i])
      ];
    }

    foreach ($alunos as $matricula => [$falta, $nota]) {
      $update = "UPDATE diario
        SET `faltas` = $falta, `nota` = $nota
        WHERE (`id_conteudos`, `id_matriculas`, `id_atividades`) = ($id_conteudos, $matricula, $id_atividades)";
      $result_upd = mysqli_query($cnx, $update);

      $resultados = $resultados && $result_upd;
    }

    if ($resultados) {
      //se funcionou, avisa que deu certo
      http_response_code(200);
      echo "Valores alterados com sucesso.";
    } else {
      //se não, manda erro 500 especial pq deu ruim
      http_response_code(500);
      echo "Ocorreu um erro interno. Pode ser que apenas parte dos valores tenha sido alterada. Tente novamente.";
    }
  } elseif ($existe === false) {
    //Registro não existe, não tem como deletar
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

function trataParametro($cnx, $param)
{
  $valor = mysqli_real_escape_string($cnx, trim($param));

  if (empty($valor)) {
    $valor = 0;
  }
  return $valor;
}

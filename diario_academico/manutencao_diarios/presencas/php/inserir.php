<?php
require_once 'dados_cnx.php';
require_once 'funcoes.php';

global $cnx;

$faltando = [];

$id_conteudos = verificaFaltando('id_conteudos', 'id do conteúdo');
$id_atividades = verificaFaltando('id_atividades', 'id da atividade');

if (empty($faltando)) {
  $existe = presencas_existem($cnx, $id_conteudos, $id_atividades);

  if ($existe === false) { //não existe, insere a presença
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
      $insert = "INSERT INTO diario VALUES ($id_conteudos, $matricula, $id_atividades, $falta, $nota)";
      $result_ins = mysqli_query($cnx, $insert);

      $resultados = $resultados && $result_ins;
    }

    if ($resultados) {
      http_response_code(200);
      echo "Lançamentos inseridos com sucesso!";
    } else {
      enviar_erro_500();

      $delete = "DELETE FROM diario WHERE (`id_conteudos`, `id_atividades`) = ($id_conteudos, $id_atividades)";
      $result_del = mysqli_query($cnx, $delete);
    }
  } elseif ($existe === true) {
    //manda conflict pq já existe esse registro, tem que alterar
    http_response_code(409);
    echo "Esse registro já existe. Para alterá-lo, vá para a página de alteração.";
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

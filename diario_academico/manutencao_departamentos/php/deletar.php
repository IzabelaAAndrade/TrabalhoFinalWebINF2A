<?php
require_once 'dados_cnx.php';

global $cnx;

if (!empty($_POST['id']) && !empty($_POST['id_campi']) && !empty($_POST['nome'])) {
  if (trim($_POST['id']) && trim($_POST['id_campi']) && trim($_POST['nome'])) {
    $id = mysqli_real_escape_string($cnx, trim($_POST['id']));
    $id_campi = mysqli_real_escape_string($cnx, trim($_POST['id_campi']));
    $nome = mysqli_real_escape_string($cnx, trim($_POST['nome']));

    $existe = depto_existe_completa($cnx, $id, $id_campi, $nome);

    if ($existe === true) {
      $verificacao = tem_cursos_ou_professores($cnx, $id);

      if($verificacao === false){
        $delete = "DELETE FROM depto WHERE `id` = $id AND `id_campi` = $id_campi AND `nome` = '$nome'";
        $result_del = mysqli_query($cnx, $delete);

        if ($result_del) {
          http_response_code(200);
          echo json_encode(["id" => $id, "id_campi" => $id_campi, "nome" => $nome]);
        } else {
          enviar_erro_500();
        }
      }elseif($verificacao === true){
        http_response_code(409);
        echo "Não foi possível deletar este departamento, pois ele ainda possui cursos ou professores.\n".
        "Remova-os primeiro para que seja possível completar a operação.";
      }else{
        enviar_erro_500();
      }

    } elseif ($existe === false) {
      http_response_code(404);
      echo "O departamento indicado não existe.";
    } else {
      enviar_erro_500();
    }
  } else {
    http_response_code(400);
    echo "Todos os campos devem ser preenchidos para realizar a operação.";
  }
} else {
  http_response_code(400);
  echo "Todos os campos devem ser preenchidos para realizar a operação.";
}

function depto_existe_completa($cnx, $id, $id_campi, $nome)
{
  if (!empty($id) && !empty($id_campi) && !empty($nome)) {
    $query = "SELECT COUNT(*) FROM `depto` WHERE `id` = $id AND `id_campi` = $id_campi AND `nome` = '$nome'";
    $result = mysqli_query($cnx, $query);

    if ($result !== false) {
      $count = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
      return ($count != 0);
    }
  }

  return null;
}

function enviar_erro_500()
{
  http_response_code(500);
  echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
}

function tem_cursos_ou_professores($cnx, $depto){
  $retorno = null;

  $sel_cursos = "SELECT COUNT(*) FROM `cursos` WHERE `id_depto` = $depto";
  $sel_profs = "SELECT COUNT(*) FROM `professores` WHERE `id_depto` = $depto";

  $result_cursos = mysqli_query($cnx, $sel_cursos);
  $result_profs = mysqli_query($cnx, $sel_profs);

  if($result_cursos !== false){
    $count = mysqli_fetch_row($result_cursos)[0];
    mysqli_free_result($result_cursos);

    $retorno = ($count != 0);
  }

  if($result_profs !== false){
    $count = mysqli_fetch_row($result_profs)[0];
    mysqli_free_result($result_profs);

    if($retorno !== null){
      $retorno = $retorno || ($count != 0);
    }
  }

  return $retorno;
}
<?php
require_once 'dados_cnx.php'; //Acesso à conexão MySQL
require_once 'depto_existe.php';

global $cnx;

$faltando = [];

if (!empty($_POST['id_campi']) && trim($_POST['id_campi'])) {
  $id_campi = mysqli_real_escape_string($cnx, trim($_POST['id_campi']));
} else {
  array_push($faltando, "id do campus");
}

if (!empty($_POST['nome']) && trim($_POST['nome'])) {
  $nome = mysqli_real_escape_string($cnx, trim($_POST['nome']));
} else {
  array_push($faltando, "nome do departamento");
}

if (empty($faltando)) {
  $existe = depto_existe($cnx, $id_campi, $nome);

  if ($existe === false) {
    $insert = "INSERT INTO depto (id_campi, nome) VALUES ($id_campi, '$nome')";
    $result_ins = mysqli_query($cnx, $insert);

    if ($result_ins) {
      $select = "SELECT * from depto";
      $result_sel = mysqli_query($cnx, $select);
      $result = mysqli_fetch_all($result_sel, MYSQLI_ASSOC);
      echo json_encode($result);

      mysqli_free_result($result_sel);
    } else {
      enviar_erro_500();
    }
  } else if ($existe === true) {
    http_response_code(409);
    echo "Um departamento de mesmo nome e campus já existe.";
  } else {
    enviar_erro_500();
  }
} else {
  http_response_code(400);
  echo "Parâmetros obrigatórios faltando: " . implode(', ', $faltando);
}

function enviar_erro_500()
{
  http_response_code(500);
  echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
}

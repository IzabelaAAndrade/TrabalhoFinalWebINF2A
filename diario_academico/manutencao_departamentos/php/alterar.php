<?php
require_once 'dados_cnx.php';
require_once 'depto_existe.php';

global $cnx;

if (!empty($_POST['id']) && !empty($_POST['id_campi']) && !empty($_POST['nome'])) {
  if (trim($_POST['id']) && trim($_POST['id_campi']) && trim($_POST['nome'])) {
    $id = mysqli_real_escape_string($cnx, trim($_POST['id']));
    $id_campi = mysqli_real_escape_string($cnx, trim($_POST['id_campi']));
    $nome = mysqli_real_escape_string($cnx, trim($_POST['nome']));

    $existe_destino = depto_existe($cnx, $id_campi, $nome);

    if ($existe_destino === false) {
      $update = "UPDATE depto SET `id_campi` = $id_campi, `nome` = '$nome' WHERE `id` = $id";
      $result_upd = mysqli_query($cnx, $update);

      if ($result_upd) {
        $select = "SELECT * from depto WHERE `id` = $id";
        $result_sel = mysqli_query($cnx, $select);

        if ($result_sel !== false) {
          $result = mysqli_fetch_assoc($result_sel);
          mysqli_free_result($result_sel);
          echo json_encode($result);
        } else {
          enviar_erro_500();
        }
      } else {
        enviar_erro_500();
      }
    } elseif ($existe_destino === true) {
      http_response_code(409);
      echo "Um departamento com o nome e campus desejados já existe.";
    } else {
      enviar_erro_500();
    }
  } else {
    http_response_code(400);
    echo "Todos os campos devem ser preenchidos para realizar a alteração.";
  }
} else {
  http_response_code(400);
  echo "Todos os campos devem ser preenchidos para realizar a alteração.";
}

function enviar_erro_500()
{
  http_response_code(500);
  echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
}

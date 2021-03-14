<?php
require_once 'dados_cnx.php';

global $cnx;

if(!empty($_POST['id']) && !empty($_POST['id_campi']) && !empty($_POST['nome'])){
  if(trim($_POST['id']) && trim($_POST['id_campi']) && trim($_POST['nome'])){
    $id = mysqli_real_escape_string($cnx, trim($_POST['id']));
    $id_campi = mysqli_real_escape_string($cnx, trim($_POST['id_campi']));
    $nome = mysqli_real_escape_string($cnx, trim($_POST['nome']));

    $existe = depto_existe_completa($cnx, $id, $id_campi, $nome);

    if($existe === true){
      $delete = "DELETE FROM depto WHERE `id` = $id AND `id_campi` = $id_campi AND `nome` = '$nome'";
      $result_del = mysqli_query($cnx, $delete);

      if($result_del){
        http_response_code(200);
        echo json_encode(["id" => $id, "id_campi" => $id_campi, "nome" => $nome]);
      }else{
        enviar_erro_500();
      }
    }else if($existe === false){
      http_response_code(404);
      echo "O departamento indicado não existe.";
    }else{
      enviar_erro_500();
    }
  }else{
    http_response_code(400);
    echo "Todos os campos devem ser preenchidos para realizar a operação.";
  }
}else{
  http_response_code(400);
  echo "Todos os campos devem ser preenchidos para realizar a operação.";
}

function depto_existe_completa($cnx, $id, $id_campi, $nome){
  if(!empty($id) && !empty($id_campi) && !empty($nome)){
    $query = "SELECT COUNT(*) FROM `depto` WHERE `id` = $id AND `id_campi` = $id_campi AND `nome` = '$nome'";
    $result = mysqli_query($cnx, $query);

    if($result !== false){
      $count = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
      return ($count != 0);
    }
  }

  return null;
}

function enviar_erro_500(){
  http_response_code(500);
  echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
}
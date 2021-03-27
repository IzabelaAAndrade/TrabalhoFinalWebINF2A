<?php
function presencas_existem($cnx, $id_conteudos, $id_atividades){
  if(!empty($id_conteudos) && !empty($id_atividades)){
    $query = "SELECT COUNT(*) FROM `diario` WHERE `id_conteudos` = $id_conteudos AND `id_atividades` = '$id_atividades'";
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
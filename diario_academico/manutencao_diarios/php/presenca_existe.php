<?php
function presenca_existe($cnx, $id_conteudos, $id_matriculas, $id_atividades){
  if(!empty($id_conteudos) && !empty($id_matriculas) &&
    !empty($id_atividades)
  ){
    $query = "SELECT COUNT(*) FROM `diario`
        WHERE `id_conteudos` = $id_conteudos
        AND `id_matriculas` = $id_matriculas
        AND `id_atividades` = $id_atividades";

    $result = mysqli_query($cnx, $query);

    if($result !== false){
      $count = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
      return ($count != 0);
    }
  }

  return null;
}
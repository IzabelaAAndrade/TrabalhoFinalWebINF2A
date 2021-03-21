<?php
function depto_existe($cnx, $id_campi, $nome){
  if(!empty($id_campi) && !empty($nome)){
    $query = "SELECT COUNT(*) FROM `depto` WHERE `id_campi` = $id_campi AND `nome` = '$nome'";
    $result = mysqli_query($cnx, $query);

    if($result !== false){
      $count = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
      return ($count != 0);
    }
  }

  return null;
}
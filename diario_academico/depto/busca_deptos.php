<?php
require_once('dados_cnx.php'); //Acesso à conexão MySQL
global $cnx;

$result = mysqli_query($cnx, "SELECT * FROM depto");

if($result !== false){
  http_response_code(200);
  $deptos = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($deptos);
}else{
  http_response_code(500);
  echo "Houve um erro no servidor ao processar o pedido. Por favor, reporte esse erro ao administrador do sistema.";
}
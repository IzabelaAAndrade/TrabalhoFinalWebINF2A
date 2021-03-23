<?php
require_once 'dados_cnx.php';
require_once 'presenca_existe.php';

global $cnx;

$faltando = [];

$id_conteudos = verificaFaltando('id_conteudos', 'id do conteúdo');
$id_matriculas = verificaFaltando('id_matriculas', 'matrícula do aluno');
$id_atividades = verificaFaltando('id_atividades', 'id da atividade');
$faltas = verificaFaltando('faltas', 'quantidade de faltas');
$nota = verificaFaltando('nota', 'nota');

if(empty($faltando)){
  $existe = presenca_existe($cnx, $id_conteudos, $id_matriculas, $id_atividades);

  if ($existe === false) { //não existe, insere a presença

    //executa a inserção
    $insert = "INSERT INTO diario VALUES ($id_conteudos, $id_matriculas, $id_atividades, $faltas, $nota)";
    $result_ins = mysqli_query($cnx, $insert);

    if ($result_ins) {
      //se funcionou, avisa que deu certo
      http_response_code(200);
      echo "Presença inserida com sucesso.";

    } else {
      //se não, manda erro 500 pq deu ruim
      enviar_erro_500();
    }
  } else if ($existe === true) {
    //manda conflict pq já existe esse registro, tem que alterar
    http_response_code(409);
    echo "Esse registro já existe. Para alterá-lo, vá para a página de alteração.";
  } else {
    //deu ruim na verificação (retornou null), manda erro 500
    enviar_erro_500();
  }
}else{
  http_response_code(400);
  echo "Parâmetros obrigatórios faltando: " . implode(', ', $faltando);
}

function verificaFaltando($var, $str){
  global $cnx, $faltando;
  $valor = '';

  if (!empty($_GET[$var]) && trim($_GET[$var])) {
    $valor = mysqli_real_escape_string($cnx, trim($_GET[$var]));
  } else {
    array_push($faltando, $str);
  }

  return $valor;
}
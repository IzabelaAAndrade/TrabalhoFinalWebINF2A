<?php
session_start();
 //dados relativos ao banco de dados
 $servidor = "localhost";
 $usuario = "root";
 $senha = "";
 $nome_db = "biblioteca";
 $povoa_tabelas = "povoa_tabelas.sql";

 if(empty($_POST['estimativa_reserva'])){
    $_SESSION['confirma'] = 5;
    header("Location: cria_reserva.php");
    exit();
 }

 $conexao = mysqli_connect($servidor, $usuario, $senha, $nome_db) or die("Houve um problema na conexão :(");

 $itens = isset($_POST['id_itens']) ? $_POST['id_itens'] : "Erro";
 $alunos = isset($_POST['id_alunos']) ? $_POST['id_alunos'] : "Erro";
 $data = isset($_POST['estimativa_reserva']) ? $_POST['estimativa_reserva'] : "Erro";


 $query_alunos = "SELECT * FROM reservas WHERE id_alunos ='".$alunos."'" or die(mysqli_error($conexao));
 $resultado_alunos = mysqli_query($conexao, $query_alunos);
 $query_itens = "SELECT * FROM reservas WHERE id_acervo = '".$itens."'";
 $resultado_itens = mysqli_query($conexao, $query_itens);

 $query_emprestimo = "SELECT * FROM emprestimos WHERE id_acervo  = '".$itens."' AND id_alunos = '".$alunos."'";
 $result_emprestimo = mysqli_query($conexao, $query_emprestimo);
 $rows_emprestimos = mysqli_num_rows($result_emprestimo);
 $row_alunos = mysqli_num_rows($resultado_alunos);
 $row_itens = mysqli_num_rows($resultado_itens);

 $emprestou = "N";



    
 function insere_na_tabela($data_reserva){

    global $data, $alunos, $itens, $conexao, $row_itens, $contador, $emprestou; // Data digitada em segundos
    $nova_data = $data_reserva+(7 *24 * 60 * 60); // Data em segundos + 7 dias em segundos
    $tempo_espera_dias = ($contador+1)*7; // Conversão -> tempo de espera em dias;
    //$data_emprestimo_futuro = $nova_data/86400;
    $data_reserva = date('Y-m-d', $data_reserva);
    $inserir_reserva = "INSERT INTO `reservas` (`id_alunos`, `id_acervo`, `data_reserva`, `tempo_espera`, `emprestou`) VALUES
    ('".$alunos."', '".$itens."', '".$data_reserva."', '".$tempo_espera_dias."' , '".$emprestou."');";
    mysqli_query($conexao, $inserir_reserva);
 }


    $contador = 0;
    if($row_alunos > 0){
        $_SESSION['confirma'] = 1;
    }if($rows_emprestimos>0){
        $emprestou = "S";
        $_SESSION['confirma'] = 7; 
    }else if($row_itens > 0){
       while($tem_reserva =  mysqli_fetch_assoc($resultado_itens)){
          $ultima_reserva = $tem_reserva['data_reserva'];
          $contador++;
       }
       $ultima_reserva_segundos = strtotime($ultima_reserva);
       $data_disponivel_segundos = $ultima_reserva_segundos + (7 * 24 * 60 * 60);
       $data_desejada_segundos = strtotime($data);
       if($data_desejada_segundos<$data_disponivel_segundos){
            $data_disponivel = date('d/m/Y', $data_disponivel_segundos);
            $_SESSION['confirma'] = 2;
       }else{
            insere_na_tabela($data_disponivel_segundos);
            $_SESSION['confirma'] = 3;

           }



    }else{
        insere_na_tabela(strtotime($data));
        $_SESSION['confirma'] = 3;

    }


 mysqli_close($conexao); 
 header("Location: cria_reserva.php?data='". $data_disponivel ."'");


?> 
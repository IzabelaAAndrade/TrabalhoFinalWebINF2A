<?php
session_start();
//dados relativos ao banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nome_db = "biblioteca";
$povoa_tabelas = "povoa_tabelas.sql";

if(empty($_POST['estimativa_reserva'])){
    $_SESSION['confirma'] = 4;
    header("Location: cria_reserva.php");
    exit();
}

$conexao = mysqli_connect($servidor, $usuario, $senha, $nome_db) or die("Houve um problema na conexão :(");

$itens = isset($_POST['id_itens']) ? $_POST['id_itens'] : "Erro";
$alunos = isset($_POST['id_alunos']) ? $_POST['id_alunos'] : "Erro";
$data = isset($_POST['estimativa_reserva']) ? $_POST['estimativa_reserva'] : "Erro";
//$verifica_emprestimo = "SELECT * FROM emprestimos WHERE id_acervo='".$."'" ;

$query_alunos = "SELECT * FROM reservas WHERE id_alunos ='".$alunos."'" or die(mysqli_error($conexao));
$resultado_alunos = mysqli_query($conexao, $query_alunos);
$query_itens = "SELECT * FROM reservas WHERE id_acervo = '".$itens."'";
$resultado_itens = mysqli_query($conexao, $query_itens);

$row_alunos = mysqli_num_rows($resultado_alunos);
$row_itens = mysqli_num_rows($resultado_itens);

//var_dump($alunos);

function insere_na_tabela($data_antiga){
    global $data, $alunos, $itens, $conexao, $row_itens; // Data digitada em segundos
    $nova_data = $data_antiga+604800; // Data em segundos + 7 dias em segundos
    $tempo_espera_dias = ($row_itens+1)*7 ; // Conversão -> tempo de espera em dias;
    $data_reserva = date('Y-m-d', $data_antiga);
    $inserir_reserva = "INSERT INTO `reservas` (`id_alunos`, `id_acervo`, `data_reserva`, `tempo_espera`, `emprestou`) VALUES
    ('".$alunos."', '".$itens."', '".$data_reserva."', '".$tempo_espera_dias."' , 'N');";
    mysqli_query($conexao, $inserir_reserva);
}



if($row_alunos > 0){
    $_SESSION['confirma'] = 1;
}else if($row_itens > 0){
    $verifica_reserva = "SELECT * FROM reservas WHERE id_acervo = \"".$itens."\"";
    $tem_reserva =  mysqli_fetch_all($resultado_itens, 1); // Caso tenham reservas, $tem_reserva >0
    if(sizeof($tem_reserva) > 0){
        //última reserva em segundos
        $ultima_reserva_segundos = strtotime($tem_reserva[sizeof($tem_reserva)-1]['data_reserva']);
        $data_disponivel_segundos = $ultima_reserva_segundos+604800;
        $data_desejada_segundos = strtotime($data);
        if($data_desejada_segundos==$data_disponivel_segundos){
            $data_disponivel = date('d/m/Y', $data_disponivel_segundos);
            $_SESSION['confirma'] = 2;
        }else{
            if(($data_disponivel_segundos) == strtotime($data)){
                insere_na_tabela($ultima_reserva_segundos);
                $_SESSION['confirma'] = 3;
            }else{
                $_SESSION['confirma'] = 6;
        

        }
    }

}else{

    if(strtotime($data) == strtotime('today')){
        insere_na_tabela(strtotime($data));
        $_SESSION['confirma'] = 3;
    }else{
        $_SESSION['confirma'] = 6;

    }
    


}


mysqli_close($conexao);
header("Location: cria_reserva.php?data='". $data_disponivel ."'");


?>

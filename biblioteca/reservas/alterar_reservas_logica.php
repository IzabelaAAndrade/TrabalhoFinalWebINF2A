<?php
session_start();
$id = $_SESSION['reserva_a_ser_alterada'];
$id_acervo = $_GET['id_itens'];
$data_reserva = $_GET['estimativa_reserva'];
$aluno = $_GET['id_alunos'];
$conexao = mysqli_connect("localhost", "root", "", "biblioteca") or die("Erro de conexão!");
$query = "UPDATE reservas SET id_acervo='$id_acervo', data_reserva='$data_reserva' where id = '" . $id . "'";

//Possíveis erros
$query_consulta_aluno = "SELECT * FROM reservas where id_alunos = '" . $aluno . "'";
$query_consulta_livro = "SELECT * FROM reservas where id_acervo = '" . $id_acervos . "'";

$resultado_alunos = mysqli_query($conexao, $query_consulta_aluno);
$resultado_itens = mysqli_query($conexao, $query_consulta_livro);

$row_alunos = mysqli_num_rows($resultado_alunos);
$row_itens = mysqli_num_rows($resultado_itens);

if($row_alunos > 0){
    $_SESSION['confirma'] = 1;
}else if($row_itens > 0){
    $verifica_reserva = "SELECT * FROM reservas WHERE id_acervo = \"".$itens[0]."\"";
    $tem_reserva =  mysqli_fetch_all($resultado_itens, 1); // Caso tenham reservas, $tem_reserva >0
    if(sizeof($tem_reserva) > 0){
        //última reserva em segundos
        $ultima_reserva_segundos = strtotime($tem_reserva[sizeof($tem_reserva)-1]['data_reserva']);
        $data_disponivel_segundos = $ultima_reserva_segundos+604800;
        $data_desejada_segundos = strtotime($data);
        if($data_desejada_segundos<$data_disponivel_segundos){
            $data_disponivel = date('d/m/Y', $data_disponivel_segundos);
            $_SESSION['confirma'] = 2;
        }else{
            mysqli_query($conexao, $query);
            $_SESSION['confirma'] = 6;

        }
    }

}else{
    mysqli_query($conexao, $query);
    $_SESSION['confirma'] = 6;

}

unset($_SESSION['reserva_a_ser_alterada']);
mysqli_close($conexao);
$_SESSION["confirma"] = "6";
header('location: cria_reserva.php');
?>

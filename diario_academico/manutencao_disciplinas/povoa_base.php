<?php
session_start();
include "conexao_bd.php";
global $conexao;
if (!isset($_SESSION['cdb'])) {
    $_SESSION['cdb'] = true;
    $query = "INSERT INTO disciplinas (id_turmas, nome, carga_horaria_min)
VALUES
(1,'Matematica',8.5),
(2,'Quimica',9),
(4,'Geografia',22),
(20,'Matematica',20) ";
    $result = mysqli_query($conexao, $query);
} else {

}
mysqli_close($conexao);
?>
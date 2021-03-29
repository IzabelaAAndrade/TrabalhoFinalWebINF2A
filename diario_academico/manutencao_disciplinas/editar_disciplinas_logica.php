<?php
session_start();
$idt = $_GET['id_turmas'];
$nome = $_GET['nome'];
$min = $_GET['min'];
$qual = $_SESSION['funciona'];
$tem = false;

$cnx = mysqli_connect("localhost", "root", "", "academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas where id = "' . $qual . '"';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
for ($i = 0; $i < count($table); $i++) {
    if ($idt == $table[$i][1] && $nome == $table[$i][2] && $min == $table[$i][3]) {
        $tem = true;
    }
}
if ($tem == false) {
    if ($idt != null && $nome != null && $min != null) {
        if ($idt != -1) {
            $sql = "update disciplinas set id_turmas = '" . $idt . "',nome = '" . $nome . "',carga_horaria_min = '" . $min . "' where id = '" . $table[0][0] . "'";
            $_SESSION["sts"] = "3";
            unset($_SESSION['funciona']);
        } else {
            $_SESSION["sts"] = "5";
            unset($_SESSION['funciona']);
        }
    } else {
        $_SESSION["sts"] = "5";
        unset($_SESSION['funciona']);
    }
} else {
    $_SESSION["sts"] = "2";
    unset($_SESSION['funciona']);
}

mysqli_query($cnx, $sql);
mysqli_close($cnx);

header('location: disciplinas_index.php');
?>

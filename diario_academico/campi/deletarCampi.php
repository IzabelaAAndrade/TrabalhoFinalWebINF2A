<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id=$_POST['id'];

$idCampi = "SELECT id_campi FROM depto";
$result = mysqli_query(mysqli_connect($dbhost, $dbuser, $dbpass, $dbname), $idCampi);
$verificacao = true;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row["id_campi"] == $id) {
        $verificacao = false;
    }
}

if ($verificacao) {
    mysqli_query($con,"DELETE FROM campi WHERE id='$id'");
}
else {
    echo "<script>alert('Não é possível deletar este campus, há ao menos um departamento cadastrado nele!');</script>";
}
echo "<script>location.href='campi.php'</script>";
?>
